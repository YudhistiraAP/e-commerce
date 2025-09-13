<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <div class="flex items-start justify-between mb-6">
            <h1 class="text-2xl font-bold">Pesanan #{{ $order->id }}</h1>
            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex items-center gap-2">
                @csrf @method('PUT')
                <select name="status" class="border rounded px-3 py-2">
                    @foreach($statuses as $s)
                        <option value="{{ $s }}" {{ $order->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded">Update Status</button>
            </form>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        <div class="grid md:grid-cols-3 gap-6">
            <div class="md:col-span-2 bg-white p-6 rounded shadow">
                <h2 class="font-semibold mb-3">Item Pesanan</h2>
                <div class="divide-y">
                    @foreach($order->items as $item)
                        <div class="py-4 flex items-center gap-4">
                            @if($item->product?->image)
                                <img src="{{ asset('storage/'.$item->product->image) }}" class="w-16 h-16 object-cover rounded">
                            @endif
                            <div class="flex-1">
                                <div class="font-medium">{{ $item->product?->name ?? 'Produk dihapus' }}</div>
                                <div class="text-sm text-gray-500">Qty: {{ $item->quantity }}</div>
                            </div>
                            <div class="text-right">
                                <div>Rp {{ number_format($item->price,0,',','.') }}</div>
                                <div class="text-sm text-gray-500">Subtotal:
                                    Rp {{ number_format($item->price * $item->quantity,0,',','.') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pt-4 text-right font-semibold">
                    Total: Rp {{ number_format($order->total,0,',','.') }}
                </div>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <h2 class="font-semibold mb-3">Info Pelanggan</h2>
                <div class="text-sm">
                    <div><span class="text-gray-500">Nama:</span> {{ $order->user?->name ?? '-' }}</div>
                    <div><span class="text-gray-500">Email:</span> {{ $order->user?->email ?? '-' }}</div>
                </div>

                <h2 class="font-semibold mt-6 mb-3">Pengiriman & Pembayaran</h2>
                <div class="text-sm">
                    <div><span class="text-gray-500">Alamat:</span><br>{{ $order->shipping_address }}</div>
                    <div class="mt-2"><span class="text-gray-500">Pembayaran:</span> {{ $order->payment_method }}</div>
                    <div class="mt-2"><span class="text-gray-500">Status:</span> {{ ucfirst($order->status) }}</div>
                    <div class="mt-2"><span class="text-gray-500">Tanggal:</span> {{ $order->created_at->format('d M Y H:i') }}</div>
                </div>
            </div>
            <a href="{{ route('orders.print', $order) }}" target="_blank"
            class="px-4 py-2 bg-indigo-600 text-white rounded w-28">
                Print Struk
            </a>
        </div>
    </div>
</x-app-layout>
