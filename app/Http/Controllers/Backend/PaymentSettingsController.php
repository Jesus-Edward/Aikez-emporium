<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentGatewayUpdateRequest;
use App\Models\PaymentGatewaySetting;
use App\Services\PaymentGatewayService;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class PaymentSettingsController extends Controller
{
    use FileUploadTrait;

    public function index() {
        $paymentGateway = PaymentGatewaySetting::pluck('value', 'key');
        return view('admin.payment-settings.index', compact('paymentGateway'));
    }

    public function StorePayStackSettings(PaymentGatewayUpdateRequest $request)
    {
        $validatedData = $request->validated();
        
        if ($request->hasFile('paystack_logo')) {
            $request->validate([
                "paypal_logo" => ['nullable', 'image']
            ]);

            $imagePath = $this->uploadImage($request, 'paystack_logo');
            PaymentGatewaySetting::updateOrCreate(
                ['key' => 'paystack_logo'],
                ['value' => $imagePath]
            );
        }

        foreach ($validatedData as $key => $value) {
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $payment_settings = app(PaymentGatewayService::class);
        $payment_settings->clearCachedSettings();

        $notification = array(
            'message' => 'Payment settings set successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
