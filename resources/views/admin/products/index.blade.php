<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Produk</h1>
            <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Tambah Produk</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        {{-- Form Search & Filter --}}
        <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap gap-2 mb-4">
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

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left">Gambar</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Harga</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                        <tr class="border-t">
                            <td class="px-4 py-3">
                                @if($p->image)
                                    <img src="{{ asset('storage/'.$p->image) }}" alt="" class="w-20 h-20 object-cover rounded">
                                @else
                                    <div class="w-20 h-20 bg-gray-100 flex items-center justify-center text-sm text-gray-400 rounded">No image</div>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $p->name }}</td>
                            <td class="px-4 py-3">{{ $p->category->name ?? '-' }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($p->price,0,',','.') }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.products.edit', $p) }}" class="text-indigo-600 mr-2">Edit</a>

                                <form action="{{ route('admin.products.destroy', $p) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
