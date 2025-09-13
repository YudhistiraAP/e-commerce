<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <h1 class="text-2xl font-bold">Riwayat Pesanan</h1>

            <form method="GET" action="{{ route('orders.index') }}" class="flex items-center gap-2">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari ID pesanan..."
                       class="border rounded px-3 py-2" />
                <select name="status" class="border rounded px-3 py-2">
                    <option value="">{{ __('Semua Status') }}</option>
                    @foreach($statuses as $key => $label)
                        <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="px-3 py-2 bg-indigo-600 text-white rounded">Filter</button>
                <a href="{{ route('orders.index') }}" class="px-3 py-2 bg-gray-200 rounded text-sm">Reset</a>
            </form>
        </div>

        @forelse($orders as $order)
            <div class="bg-white border rounded p-4 mb-4 shadow-sm">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                    <div>
                        <div class="text-sm text-gray-500">#{{ $order->id }} • {{ $order->created_at->format('d M Y H:i') }}</div>
                        <div class="text-lg font-semibold">Total: Rp {{ number_format($order->total,0,',','.') }}</div>
                    </div>

                    <div class="flex items-center gap-3">
                        {{-- status badge --}}
                        @php
                            $badge = [
                                'pending'    => 'bg-yellow-100 text-yellow-800',
                                'paid'       => 'bg-blue-100 text-blue-800',
                                'processing' => 'bg-indigo-100 text-indigo-800',
                                'shipped'    => 'bg-orange-100 text-orange-800',
                                'completed'  => 'bg-green-100 text-green-800',
                                'cancelled'  => 'bg-red-100 text-red-800',
                            ];
                            $cls = $badge[$order->status] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $cls }}">
                            {{ $statuses[$order->status] ?? ucfirst($order->status) }}
                        </span>

                        <a href="{{ route('orders.show', $order) }}" class="text-indigo-600 underline">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white p-6 rounded shadow">Belum ada pesanan.</div>
        @endforelse

        <div class="mt-6">
            {{ $orders->links() }} {{-- default Tailwind pagination --}}
        </div>
    </div>
</x-app-layout>
