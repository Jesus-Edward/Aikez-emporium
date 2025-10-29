<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderPlacedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login() {
        return view('admin.auth.login');
    }

    public function forgotPassword()
    {
        return view('admin.auth.forgot-password');
    }

    function clearNotification()
    {
        $notification = OrderPlacedNotification::query()->update(['seen' => 1]);
        $alert = array('message' => 'All messages marked as read', 'alert-type' => 'success');
        return redirect()->back()->with($alert);
    }
}
