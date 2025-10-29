<?php

namespace App\Listeners;

use App\Models\Wishlist;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MergeGuestWishlist
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $userId = $event->user->id;
        $guestToken = request()->cookie('guest_wishlist_token');


        if ($guestToken) {
            Wishlist::where('guest_token', $guestToken)->whereNull('user_id')->update(['user_id' => $userId, 'guest_token' => null]);
        }

        Log::info('MergeGuestWishlist triggered', [
            'user_id' => $event->user->id,
            'guest_token' => $guestToken,
            
        ]);
    }
}
