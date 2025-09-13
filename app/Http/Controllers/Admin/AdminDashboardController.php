<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('total');

        $recentOrders = Order::with('items.product', 'user')
            ->latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'userCount',
            'productCount',
            'orderCount',
            'totalRevenue',
            'recentOrders'
        ));
    }
}
