<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium mb-1">Alamat Pengiriman</label>
                <textarea name="shipping_address" class="w-full border rounded px-3 py-2" required></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Metode Pembayaran</label>
                <select name="payment_method" class="w-full border rounded px-3 py-2" required>
                    <option value="COD">Bayar di Tempat (COD)</option>
                    <option value="Bank Transfer">Transfer Bank</option>
                </select>
            </div>

            <div class="font-bold text-lg">
                Total: Rp {{ number_format($total,0,',','.') }}
            </div>

            <button class="px-4 py-2 bg-green-600 text-white rounded">
                Buat Pesanan
            </button>
        </form>
    </div>
</x-app-layout>
