<?php

namespace App\Services;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    public function getSettings()
    {
        return Cache::rememberForever('settings', function () {
            return GeneralSetting::pluck('value', 'key')->toArray();
        });
    }

    public function setGlobalConfig()
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }

    public function clearCachedSettings()
    {
        Cache::forget('settings');
    }
}
