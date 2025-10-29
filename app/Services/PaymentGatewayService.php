<?php

namespace App\Services;

use App\Models\PaymentGatewaySetting;
use Illuminate\Support\Facades\Cache;

class PaymentGatewayService
{
    public function getSettings()
    {
        return Cache::rememberForever('payment_settings', function () {
            return PaymentGatewaySetting::pluck('value', 'key')->toArray();
        });
    }

    public function setGlobalConfig()
    {
        $payment_settings = $this->getSettings();
        config()->set('payment_settings', $payment_settings);
    }

    public function clearCachedSettings()
    {
        Cache::forget('payment_settings');
    }
}
