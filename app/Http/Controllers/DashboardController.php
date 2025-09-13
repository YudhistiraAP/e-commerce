<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        if ($user->is_admin) {
            // Dashboard Admin
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
        } else {
            // Dashboard User
            $userCount = User::count(); // Contoh, bisa dihapus kalau nggak mau dipakai
            $latestUsers = User::latest()->take(5)->get();

            return view('dashboard', compact('userCount', 'latestUsers'));
        }
    }
}