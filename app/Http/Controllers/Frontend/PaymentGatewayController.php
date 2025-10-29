<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderPlacedNotificationEvent;
use App\Events\RealTimeOrderPlacedNotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use App\Services\PaystackService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentGatewayController extends Controller
{
    protected OrderService $orders;
    protected PaystackService $paystack;

    public function __construct(OrderService $orders, PaystackService $paystack)
    {
        $this->orders = $orders;
        $this->paystack = $paystack;
    }

    /** Step 1: Called from cart page - creates order and redirects to Paystack (if chosen) */
    public function payWithPaystack(Request $request)
    {
        $request->validate([
            'payment_path' => 'required|string|in:paystack', // currently only paystack
        ]);

        $order = $this->orders->createOrders();
        $grandTotal = session()->get('grandTotal');
        $deliveryFee = session()->get('delivery_charge');

        $payload = [];

        // If Paystack redirect flow
        if ($request->payment_path === 'paystack') {
            // initialize paystack
            if ($order->order_type === 'get_sample') {
                $payload = [
                    'email' => $order->user->email,
                    'amount' => (float) round($deliveryFee * 100), // kobo
                    'reference' => $order->invoice_id,
                    'callback_url' => route('paystack.callback'),
                    'metadata' => [
                        'first_name' => $order->user->name,
                        'order_id' => $order->id,
                        'order_type' => $order->order_type,
                    ],
                ];
            }elseif($order->order_type === 'buy_tiles') {
                $payload = [
                    'email' => $order->user->email,
                    'amount' => (float) round($grandTotal * 100), // kobo
                    'reference' => $order->invoice_id,
                    'callback_url' => route('paystack.callback'),
                    'metadata' => [
                        'first_name' => $order->user->name,
                        'order_id' => $order->id,
                        'order_type' => $order->order_type,
                    ],
                ];
            }

            try {
                $res = $this->paystack->initialize($payload);
                if (!empty($res['status']) && $res['status'] === true && isset($res['data']['authorization_url'])) {
                    return response()->json([
                        'redirect_url' => $res['data']['authorization_url']
                    ]);
                }
                // initialization failed — mark order failed and show error
                $order->update(['payment_status' => 'failed']);
                return redirect()->route('product.cart.page')->withErrors('Payment failed.');
            } catch (\Exception $e) {
                Log::error('Paystack init error: ' . $e->getMessage());
                $order->update(['payment_status' => 'failed']);
                return redirect()->route('product.cart.page')->withErrors('Payment gateway error.');
            }
        }else {
            // fallback: unsupported method
            return redirect()->route('product.cart.page')->withErrors('Unsupported payment method.');
        }

    }


    /** Paystack callback - user is redirected here after payment */
    public function callback()
    {
        $orderId = session()->get('order_id');
        $order = Order::findOrFail($orderId);
        $reference = $order->invoice_id;
        if (!$reference) {
            return redirect()->route('product.cart.page')->withErrors('No transaction reference provided.');
        }

        try {
            $verify = $this->paystack->verify($reference);
            // Log::info(['verify' => $verify]);
        } catch (\Exception $e) {
            Log::error('Paystack verify error: ' . $e->getMessage());
            return redirect()->route('product.cart.page')->withErrors('Payment verification failed.');
        }

        // expected structure: ['status' => true, 'data' => ['status' => 'success', 'reference' => ...]]
        if (empty($verify['status']) || $verify['status'] !== true) {
            return redirect()->route('product.cart.page')->withErrors('Payment verification failed.');
        }

        $status = data_get($verify, 'data.status');
        $ref = data_get($verify, 'data.reference');
        $paymentMethod = data_get($verify, 'data.channel');
        $approved_at = data_get($verify, 'data.paid_at');
        $currency = data_get($verify, 'data.currency');
        $transaction_id = data_get($verify, 'data.id');
        $ordered = \App\Models\Order::where('invoice_id', $ref)->first();

        $notification = array(
            'message' => 'Order placed successfully, awaiting approval',
            'alert-type' => 'success'
        );

        $notice = array(
            'message' => 'Sample requested successfully, awaiting approval',
            'alert-type' => 'success'
        );

        if ($status === 'success') {
            // idempotent: only act if not already paid
            if (!$ordered) {
                return redirect()->route('product.cart.page')->withErrors('Order not found.');

            } else {
                if ($ordered->payment_status !== 'paid') {
                    // attempt to decrement stock
                    $ok = $this->orders->decrementStockForOrder($order);
                    if ($ok) {
                        $order->update([
                            'payment_status' => 'completed',
                            'payment_method' => $paymentMethod,
                            'payment_approved_date' => Carbon::parse($approved_at)->toDateTimeLocalString(),
                            'currency_name' => $currency,
                            'transaction_id' => $transaction_id,
                        ]);
                        OrderPlacedNotificationEvent::dispatch($orderId);
                        RealTimeOrderPlacedNotificationEvent::dispatch(Order::findOrFail($orderId));
                        $this->orders->clearSessionItems();
                        if ($ordered->order_type === 'get_sample') {
                            return redirect()->route('product.cart.page')->with($notice);
                        }
                        return redirect()->route('product.cart.page')->with($notification);
                    } else {

                        // Not enough stock: leave order failed and notify admin (or refund)
                        $order->update(['payment_status' => 'failed']);
                        // TODO: trigger refund via Paystack API or notify admin
                        return redirect()->route('product.cart.page')->withErrors('Payment processed but stock unavailable. Contact support.');
                    }
                }
                // already paid - just show order
                return redirect()->route('orders.show', $order->id)->with('success', 'Order already confirmed.');
            }

        }

        // payment not successful
        $order->update(['payment_status' => 'failed']);
        return redirect()->route('product.cart.page')->withErrors('Payment not successful.');
    }

}
