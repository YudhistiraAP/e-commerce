<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 4; $i++) {
                \App\Models\Product::create([
                    'name' => $category->name . " Item $i",
                    'description' => 'Deskripsi produk ' . $i,
                    'price' => rand(50000, 500000),
                    'image' => 'https://via.placeholder.com/300x300.png?text=Produk+' . $i,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
