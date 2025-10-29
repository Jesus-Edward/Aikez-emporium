<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DeliveryArea;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $product = Product::with(['size', 'brand'])->findOrFail($request->product_id);

        if ($product->quantity < $request->quantity) {
            throw ValidationException::withMessages(['quantity' => 'Requested quantity not available.']);
        }

        $options = [
            // 'product_info' => [
                'image' => $product->image,
                'slug' => $product->slug,
                'size' => $product->size_id ? $product->size->name : null,
                'brand' => $product->brand_id ? $product->brand->name : null,
                'prod_quan' => $product->quantity
            // ]

        ];

        try {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->price,
                'weight' => 0,
                'options' => $options,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Product added to cart successfully!', 'count' => count(Cart::content())]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to add product to cart.']);
        }
    }

    public function updateCart(Request $request) {
        $cartItem = Cart::get($request->rowId);
        $products = Product::findOrFail($cartItem->id);
        if ($products->quantity < $request->qty) {
            return response(['status' => 'error', 'message' =>  'Quantity not available!', 'qty' => $cartItem->qty]);
        }

        try {
            $cart = Cart::update($request->rowId, $request->qty);
            return response(
                [
                    'status' => 'success',
                    'product_total' => productTotal($request->rowId),
                    'qty' => $cart->qty,
                    'cart_total' => cartTotalPrice(),
                    'grand_cart_total' => grandCartTotal()
                ],
                200
            );
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong!'], 500);
        }
    }

    public function cartProductRemove($rowId)
    {
        try {
            Cart::remove($rowId);

            return response([
                'status' => 'success',
                'message' => 'Product removed successfully!',
                'cart_total' => cartTotalPrice(),
                'grand_cart_total' => grandCartTotal()
            ], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Unexpected error, something went wrong!'], 500);
        }
    }

    public function destroyCart()
    {
        Cart::destroy();
        session()->forget('coupon');
        return redirect()->back();
    }

    public function viewCart() {
        $addresses = Address::where('user_id', Auth::id())->latest()->get();
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        return view('frontend.pages.cart', compact('addresses', 'deliveryAreas'));
    }

    function calculateDeliveryCharge($id)
    {
        try {

            if ($id != 0) {

                $address = Address::with('deliveryArea')->findOrFail($id);
                $deliveryFee = $address->deliveryArea->delivery_fee;
                $grandTotal = grandCartTotal($deliveryFee);

                return response(['status' => 'success', 'delivery_fee' => $deliveryFee, 'grand_total' => $grandTotal]);
            } else {
                $deliveryFee = 0;
                $grandTotal = grandCartTotal();

                return response(['status' => 'success', 'delivery_fee' => $deliveryFee, 'grand_total' => $grandTotal]);
            }

        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong in the frontend'], 422);
        }
    }
}
