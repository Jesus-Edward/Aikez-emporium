<?php

/** Creating a unique slug */

use Gloudemans\Shoppingcart\Facades\Cart;

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name): string
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new InvalidArgumentException("Model $model not found");
        }

        $slug = Illuminate\Support\Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Illuminate\Support\Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

if (!function_exists('generateUniqueSKU')) {
    function generateUniqueSKU($productName, $size=null)
    {
        $companyName = 'AIKEZ';
        $nameCode = strtoupper(Illuminate\Support\Str::substr(Illuminate\Support\Str::slug($productName, ''), 0, 3));
        $sizeCode = $size ? strtoupper(str_replace([' ', 'sqm', 'x', 'X', 'SQM'], '', $size)) : '0000';
        $dateCode = now()->format('Ymd');
        $uniqueId = str_pad(random_int(1, 999), 3, '0', STR_PAD_LEFT);

        return "{$companyName}-{$nameCode}-{$sizeCode}-{$dateCode}-{$uniqueId}";
    }
}

if (!function_exists('currencyPosition')) {
    function currencyPosition($price): string
    {
        if (config('settings.site_currency_symbol_position') === 'left') {
            return config('settings.site_currency_symbol') . $price;
        } else {
            return $price . config('settings.site_currency_symbol');
        }
    }
}

/**cart total function */
if (!function_exists('cartTotalPrice')) {
    function cartTotalPrice()
    {
        $total = 0;
        foreach (Cart::content() as $content) {
            $productPrice = $content->price;

            $total += $productPrice * $content->qty;
        }

        return $total;
    }
}


/**product total function */
if (!function_exists('productTotal')) {
    function productTotal($rowId)
    {
        $total = 0;

        $product = Cart::get($rowId);
        $productPrice = $product->price;

        $total += $productPrice * $product->qty;

        return $total;
    }
}


/**grand total function */
if (!function_exists('grandCartTotal')) {
    function grandCartTotal($deliveryFee = 0)
    {
        $total = 0;
        $cartTotal = cartTotalPrice();

        if (session()->has('coupon')) {
            $discount = session()->get('coupon')['discount'];

            $total = ($cartTotal + $deliveryFee) - $discount;

            return $total;

        } else {
            $total = $cartTotal + $deliveryFee;

            return $total;
        }
    }
}

/**Generate unique invoice id */
if (!function_exists('generateInvoiceId')) {
    function generateInvoiceId()
    {
        $random = rand(1, 9999);
        $currentDateTime = now();

        $invoiceId = $random . $currentDateTime->format('yd') . $currentDateTime->format('s');

        return $invoiceId;
    }
}
