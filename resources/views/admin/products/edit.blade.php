<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block mb-1 font-semibold">Nama Produk</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Kategori --}}
            <div>
                <label class="block mb-1 font-semibold">Kategori</label>
                <select name="category_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block mb-1 font-semibold">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Harga --}}
            <div>
                <label class="block mb-1 font-semibold">Harga</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" class="w-full border rounded px-3 py-2">
            </div>

            {{-- Gambar --}}
            <div>
                <label class="block mb-1 font-semibold">Gambar Produk</label>
                @if($product->image)
                    <img id="previewImage" src="{{ asset('storage/'.$product->image) }}" 
                        class="w-32 h-32 object-cover rounded mb-2">
                @else
                    <img id="previewImage" src="" 
                        class="w-32 h-32 object-cover rounded mb-2 hidden">
                @endif
                <input type="file" name="image" id="imageInput" accept="image/*">
            </div>

            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update</button>
        </form>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>