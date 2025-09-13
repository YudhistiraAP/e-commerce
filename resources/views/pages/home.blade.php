<x-app-layout>
    <div class="max-w-7xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Produk Terbaru</h1>

        {{-- Form Search & Filter --}}
        <form method="GET" action="{{ route('home') }}" class="flex flex-wrap gap-2 mb-6">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari produk..."
                class="border border-gray-300 rounded px-3 py-2 w-48">

            <select name="category_id" class="border border-gray-300 rounded px-3 py-2">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                Filter
            </button>
        </form>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded shadow overflow-hidden">
                    <div class="relative w-full overflow-hidden" style="padding-top: 133.33%;">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-sm">{{ $product->name }}</h3>
                        <p class="text-red-600 font-semibold text-sm">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <div class="mt-2 flex flex-col items-center gap-2 sm:flex-row sm:justify-between">
                            {{-- Tombol lihat detail --}}
                            <a href="{{ route('products.show', $product->id) }}" 
                            class="px-4 py-2 bg-indigo-600 text-white rounded">
                                Lihat Detail
                            </a>

                            {{-- Tombol tambah ke keranjang (ikon) --}}
                            <form method="POST" action="{{ route('cart.add') }}" class="w-full sm:w-auto">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" 
                                        class="px-4 py-2 bg-gray-100 rounded hover:bg-gray-200 flex justify-center w-full sm:w-auto">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
