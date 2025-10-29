<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class EnsureGuestWishlistToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $cookieName = 'guest_wishlist_token';
        $token = $request->cookie($cookieName) ?? $request->session()->get($cookieName);

        if (!$token) {
            $token = (string) Str::uuid();
            $cookie = cookie($cookieName, $token, 60*24*31);
            $response->headers->setCookie($cookie);
        }

        return $response;
    }
}
