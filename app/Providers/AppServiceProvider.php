<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;

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
        $keys = ['pusher_app_id', 'pusher_app_key', 'pusher_app_secret_key', 'pusher_cluster'];
        $mailKeys = [
            'received_mail_address',
            'mail_from_address',
            'mail_password',
            'mail_username',
            'mail_host',
            'mail_encryption',
            'mail_port',
            'mail_mailer'
        ];

        $pusherConf = GeneralSetting::whereIn('key', $keys)->pluck('value', 'key');
        config(['broadcasting.connections.pusher.key' => $pusherConf['pusher_app_key']]);
        config(['broadcasting.connections.pusher.secret' => $pusherConf['pusher_app_secret_key']]);
        config(['broadcasting.connections.pusher.app_id' => $pusherConf['pusher_app_id']]);
        config(['broadcasting.connections.pusher.options.cluster' => $pusherConf['pusher_cluster']]);

        $mailConf = GeneralSetting::whereIn('key', $mailKeys)->pluck('value', 'key');
        config('mail.mailers.smtp.transport', $mailConf['mail_mailer']);
        config('mail.mailers.smtp.host', $mailConf['mail_host']);
        config('mail.mailers.smtp.port', $mailConf['mail_port']);
        config('mail.mailers.smtp.encryption', $mailConf['mail_encryption']);
        config('mail.mailers.smtp.username', $mailConf['mail_username']);
        config('mail.mailers.smtp.password', $mailConf['mail_password']);
        config('mail.from.address', $mailConf['mail_from_address']);
    }
}
