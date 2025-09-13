<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Detail Pesanan #{{ $order->id }}</h1>

        <div class="mb-4">
            <span class="text-sm text-gray-600">Tanggal: {{ $order->created_at->format('d M Y H:i') }}</span>
        </div>

        <div class="bg-white border rounded p-4">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p><strong>Alamat Pengiriman:</strong></p>
                    <p class="text-gray-700">{{ $order->shipping_address }}</p>
                </div>
                <div class="text-right">
                    <p><strong>Metode:</strong> {{ $order->payment_method }}</p>
                    <p class="mt-2"><strong>Total:</strong> Rp {{ number_format($order->total,0,',','.') }}</p>
                </div>
            </div>

            <h2 class="font-semibold mb-2">Produk</h2>
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-3 py-2">Produk</th>
                        <th class="border px-3 py-2">Qty</th>
                        <th class="border px-3 py-2">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td class="border px-3 py-2">{{ $item->product->name ?? 'Produk (telah dihapus)' }}</td>
                            <td class="border px-3 py-2">{{ $item->quantity }}</td>
                            <td class="border px-3 py-2">Rp {{ number_format($item->price,0,',','.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 text-right">
                <a href="{{ route('orders.index') }}" class="text-sm text-gray-600">Kembali ke Riwayat</a>
            </div>
        </div>
    </div>
</x-app-layout>
