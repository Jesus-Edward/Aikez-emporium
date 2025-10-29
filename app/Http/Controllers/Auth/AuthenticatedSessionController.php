<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $notification = array(
            'message' => 'Logged in successfully',
            'alert-type' => 'success'
        );

        if ($request->user()->role === 'admin') {
            return redirect('/admin/dashboard')->with($notification);
        } elseif ($request->user()->role === 'user') {
            return redirect()->intended('/user/profile/dashboard')->with($notification);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logged out successfully',
            'alert-type' => 'success'
        );

        return redirect()->intended('/login')->with($notification);
    }
}
