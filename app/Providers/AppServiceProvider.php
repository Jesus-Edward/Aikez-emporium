<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Mail\Transport\ResendTransport;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Resend;
use RuntimeException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Mail::extend('resend', function(array $config = []) {
            $appKey = $config['key'] ?? $config['api_key'] ?? config('services.resend.key') ?? env('RESEND_API_KEY');
            if (!$appKey) {
                throw new RuntimeException('Resend API key not provided for resend mailer');
            }

            $resendClient = Resend::client($appKey);
            return new ResendTransport($resendClient);
        });
        $mailKeys = [
            'mail_from_address',
            'mail_mailer',
            'resend_api_key'
        ];

        $mailConf = GeneralSetting::whereIn('key', $mailKeys)->pluck('value', 'key');

        Config::set('mail.from', ['address' => $mailConf['mail_from_address']]);
        Config::set(['mail.default' => $mailConf['mail_mailer']]);
        Config::set('mail.mailers.resend.key', $mailConf['resend_api_key']);
        app()->forgetInstance('mail.manager');
        app()->forgetInstance('mailer');
        app()->bind('mailer', function($app) {
            return $app->make('mail.manager')->mailer();
        });
    }

}
