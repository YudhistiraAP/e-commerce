<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Tambah Produk</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label class="block text-sm font-medium">Nama</label>
                <input name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div>
                <label class="block text-sm font-medium">Kategori</label>
                <select name="category_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">Harga</label>
                <input name="price" type="number" step="0.01" value="{{ old('price') }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Gambar (jpg, png, webp)</label>
                <input type="file" name="image" accept="image/*" class="w-full">
            </div>

            <div class="flex items-center gap-2">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded">Simpan</button>
                <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
