<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-50 text-red-700 rounded">{{ session('error') }}</div>
        @endif

        @if(empty($cart) || count($cart) == 0)
            <div class="bg-white p-6 rounded shadow">Keranjang kosong.</div>
        @else
            <div class="bg-white rounded shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-4 py-3">Produk</th>
                            <th class="text-left px-4 py-3">Harga</th>
                            <th class="text-left px-4 py-3">Jumlah</th>
                            <th class="text-left px-4 py-3">Subtotal</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr class="border-t">
                            <td class="px-4 py-4 flex items-center gap-3">
                                <div class="relative w-full overflow-hidden" style="padding-top: 75px; width: 75px;">
                                    <img src="{{ asset('storage/' . $item['image']) }}" 
                                        alt="{{ $item['name'] }}" 
                                        class="absolute inset-0 w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="font-medium">{{ $item['name'] }}</div>
                                </div>
                            </td>
                            <td class="px-4 py-4">Rp {{ number_format($item['price'],0,',','.') }}</td>
                            <td class="px-4 py-4">
                                <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-20 border rounded px-2 py-1">
                                    <button class="px-3 py-1 bg-gray-200 rounded">Update</button>
                                </form>
                            </td>
                            <td class="px-4 py-4">Rp {{ number_format($item['price'] * $item['quantity'],0,',','.') }}</td>
                            <td class="px-4 py-4">
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-500 text-white rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-6 flex justify-end items-center gap-6">
                    <div class="text-lg font-semibold">Total: Rp {{ number_format($total,0,',','.') }}</div>
                    <a href="{{ route('checkout.index') }}" class="px-4 py-2 bg-green-600 text-white rounded">Lanjut ke Checkout</a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
