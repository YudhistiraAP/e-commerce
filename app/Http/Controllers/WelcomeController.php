<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index()
    {
        $query = Product::with('category')->latest();
        $products = $query->get()->take(4);
        $categories = Category::orderBy('name')->get();

        return view('pages.welcome', compact('products', 'categories'));
    }
}
