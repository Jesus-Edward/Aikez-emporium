<?php

use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\EnsureGuestWishlistToken;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        // then: function() {
        //     require base_path('routes/channels.php');
        // }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->use([\Illuminate\Http\Middleware\HandleCors::class]);
        $middleware->web(append: EnsureGuestWishlistToken::class);
        $middleware->alias([
            'role' => AdminCheckMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
