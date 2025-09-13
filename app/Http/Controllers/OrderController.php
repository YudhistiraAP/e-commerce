<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // daftar status yang tersedia (label human-readable)
        $statuses = [
            'pending'    => 'Pending',
            'paid'       => 'Paid',
            'processing' => 'Processing',
            'shipped'    => 'Shipped',
            'completed'  => 'Completed',
            'cancelled'  => 'Cancelled',
        ];

        $query = Order::where('user_id', Auth::id());

        // filter berdasarkan status (jika ada)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // optional: search by order id
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where('id', $q);
        }

        // pagination (10 per halaman), keep query string supaya pagination mempertahankan filter
        $orders = $query->latest()->paginate(10)->withQueryString();

        return view('orders.index', compact('orders', 'statuses'));
    }

    public function show(Order $order)
    {
        // pastikan owner
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // eager load items + produk
        $order->load('orderItems.product');

        return view('orders.show', compact('order'));
    }
}
?>