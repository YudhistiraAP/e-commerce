<x-app-layout>
    <div class="max-w-xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf @method('PUT')
            <div>
                <label class="block mb-1 font-semibold">Nama Kategori</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full border rounded px-3 py-2" required>
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="flex items-center gap-2">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded">Update</button>
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
