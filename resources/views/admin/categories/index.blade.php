<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Kategori</h1>
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Tambah</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-50 text-red-700 rounded">{{ session('error') }}</div>
        @endif

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Slug</th>
                        <th class="px-4 py-3 text-left">Jumlah Produk</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $cat)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $cat->name }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $cat->slug }}</td>
                            <td class="px-4 py-3">{{ $cat->products_count }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.categories.edit', $cat) }}" class="text-indigo-600 mr-2">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
