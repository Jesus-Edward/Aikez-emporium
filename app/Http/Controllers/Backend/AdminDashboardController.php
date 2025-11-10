<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TodaysOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Order;
use App\Models\OrderPlacedNotification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }

    public function index(TodaysOrderDataTable $dataTable)
    {
        $todayOrder = Order::whereDate('created_at', today()->format('Y-m-d'))->count();
        $todayEarning = Order::whereDate('created_at', today()->format('Y-m-d'))->where('order_status', 'delivered')->sum('grand_total');

        $monthlyOrder = Order::whereMonth('created_at', today()->month)->count();
        $monthlyEarning = Order::whereMonth('created_at', today()->month)->where('order_status', 'delivered')->sum('grand_total');

        $yearlyOrder = Order::whereYear('created_at', today()->year)->count();
        $yearlyEarning = Order::whereYear('created_at', today()->year)->where('order_status', 'delivered')->sum('grand_total');

        $totalOrders = Order::count();
        $totalEarnings = Order::where('order_status', 'delivered')->sum('grand_total');

        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $totalProducts = Product::count();
        $totalBlogs = BlogPost::count();

        return $dataTable->render('admin.index', compact(
            'todayOrder',
            'todayEarning',
            'monthlyOrder',
            'monthlyEarning',
            'yearlyOrder',
            'yearlyEarning',
            'totalOrders',
            'totalEarnings',
            'totalUsers',
            'totalAdmins',
            'totalProducts',
            'totalBlogs'
        ));
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
