<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::withCount('products')->orderBy('name')->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $slug = Str::slug($data['name']);
        // optional: pastikan slug unik sederhana
        if (category::where('slug', $slug)->exists()) {
            $slug .= '-' . (category::max('id') + 1);
        }

        category::create([
            'name' => $data['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->name = $data['name'];
        // update slug jika nama berubah (opsional)
        $category->slug = Str::slug($data['name']);
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(category $category)
    {
        // Cegah hapus jika masih punya produk (aman)
        if ($category->products()->exists()) {
            return back()->with('error', 'Kategori memiliki produk. Pindahkan/hapus produk terlebih dahulu.');
        }
        $category->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
