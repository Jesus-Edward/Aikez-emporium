<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
}
