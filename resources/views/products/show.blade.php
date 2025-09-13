<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover rounded">
            </div>

            <div class="md:col-span-2 bg-white p-6 rounded shadow">
                <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
                <p class="text-gray-500 mb-4">{{ $product->description }}</p>

                <div class="text-xl font-semibold text-red-600 mb-4">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <form method="POST" action="{{ route('cart.add') }}" class="flex items-center gap-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" min="1" value="1" class="w-24 border rounded px-2 py-1">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Tambah ke Keranjang
                    </button>
                    <a href="{{ route('home') }}" class="text-sm text-gray-600">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
