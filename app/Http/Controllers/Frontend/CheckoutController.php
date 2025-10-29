<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    function checkoutRedirectPayment(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
            'order_type' => 'required|string|in:buy_tiles,get_sample'
        ]);


        $orderType = $request->order_type;
        $address = Address::with(['deliveryArea'])->findOrFail($request->id);

        $selectedArea = $address->address . ', Area: ' . $address->deliveryArea?->area_name;

        session()->put('address', $selectedArea);
        session()->put('delivery_fee', $address->deliveryArea?->delivery_fee);
        session()->put('address_id', $address->id);
        session()->put('order_type', $orderType);

        return response(['redirect_url' => route('checkout.payment.index')]);
    }

    public function index() {

        if (!session()->has('delivery_fee') || !session()->has('address')) {
            throw ValidationException::withMessages(['Something went wrong']);
        }

        $subtotal = cartTotalPrice();
        $delivery = session()->get('delivery_fee') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $grandTotal = grandCartTotal($delivery);
        $orderType = session()->get('order_type');
        return view('frontend.pages.checkout', compact(
            'subtotal',
            'delivery',
            'discount',
            'grandTotal',
            'orderType'
        ));
        // return view('frontend.pages.checkout');
    }
}
