<?php

namespace App\Providers;

use App\Listeners\MergeGuestWishlist;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app['events']->listen(Login::class, MergeGuestWishlist::class);
    }

}
