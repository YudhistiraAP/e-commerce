<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Daftar status yang diizinkan
    private array $statuses = ['pending','paid','processing','shipped','completed','cancelled'];

    public function index(Request $request)
    {
        $status = $request->query('status');

        $orders = Order::with('user')
            ->when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $statuses = $this->statuses;

        return view('admin.orders.index', compact('orders','statuses','status'));
    }

    public function show(Order $order)
    {
        $order->load(['user','items.product']);
        $statuses = $this->statuses;

        return view('admin.orders.show', compact('order','statuses'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|string|in:' . implode(',', $this->statuses),
        ]);

        $order->update(['status' => $data['status']]);

        return back()->with('success', 'Status pesanan diperbarui.');
    }

    public function print(Order $order)
    {
        // if ($order->user_id !== auth()->id()) {
        //     abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        // }

        $order->load(['items.product', 'user']);
        return view('admin.orders.print', compact('order'));
    }

}
