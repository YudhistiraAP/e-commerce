<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded shadow">
                <div class="text-sm text-gray-500">Total Users</div>
                <div class="text-2xl font-semibold">{{ $userCount }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="text-sm text-gray-500">Total Products</div>
                <div class="text-2xl font-semibold">{{ $productCount }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="text-sm text-gray-500">Total Orders</div>
                <div class="text-2xl font-semibold">{{ $orderCount }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="text-sm text-gray-500">Revenue</div>
                <div class="text-2xl font-semibold">Rp {{ number_format($totalRevenue,0,',','.') }}</div>
            </div>
        </div>

        <div class="bg-white rounded shadow p-4">
            <h2 class="font-semibold mb-4">Recent Orders</h2>
            @if($recentOrders->isEmpty())
                <div class="text-sm text-gray-500">Belum ada pesanan.</div>
            @else
                <table class="w-full text-left">
                    <thead class="text-sm text-gray-600 border-b">
                        <tr>
                            <th class="py-2">#ID</th>
                            <th class="py-2">User</th>
                            <th class="py-2">Total</th>
                            <th class="py-2">Items</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $o)
                        <tr class="border-b">
                            <td class="py-3">{{ $o->id }}</td>
                            <td class="py-3">{{ $o->user->name ?? '-' }}</td>
                            <td class="py-3">Rp {{ number_format($o->total,0,',','.') }}</td>
                            <td class="py-3">{{ $o->items->count() }} item</td>
                            <td class="py-3">{{ ucfirst($o->status) }}</td>
                            <td class="py-3">{{ $o->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
