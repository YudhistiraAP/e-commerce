<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .hero-section {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80');
                background-size: cover;
                background-position: center;
                height: 80vh;
                display: flex;
                align-items: center;
            }
            
            .category-card {
                transition: transform 0.3s ease;
            }
            
            .category-card:hover {
                transform: translateY(-5px);
            }
            
            .product-card {
                transition: all 0.3s ease;
                border: 1px solid #e5e7eb;
            }
            
            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }
            
            .testimonial-card {
                background-color: #f9fafb;
                border-left: 4px solid #3b82f6;
            }
            
            .contact-section {
                background-color: #f3f4f6;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="w-full">
                <!-- Section 1: Hero dengan Teks dan Gambar Background -->
                <section class="hero-section">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4">Temukan Gaya Hidup Terbaik Anda</h1>
                        <p class="text-xl mb-8">Koleksi produk terbaru dengan kualitas terbaik dan harga terjangkau</p>
                        <a href="#products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg inline-block transition duration-300">
                            Belanja Sekarang
                        </a>
                    </div>
                </section>

                <!-- Section 2: Kategori Produk -->
                <section class="py-16 bg-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 class="text-3xl font-bold text-center mb-12">Kategori Produk</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            @foreach($categories as $cat)
                            <div class="category-card bg-white rounded-lg shadow-md p-6 text-center">
                                <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-lg mb-2">{{ $cat->name }}</h3>
                                <p class="text-gray-600">Koleksi terbaru</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- Section 3: Produk Unggulan -->
                <section id="products" class="py-16 bg-gray-50">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 class="text-3xl font-bold text-center mb-12">Produk Unggulan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                            <!-- Produk 1 -->
                            @foreach($products as $product)
                            <div class="product-card bg-white rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </div>
                                        <span class="text-gray-600 text-sm ml-2">(24)</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-blue-600 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-12">
                            <a href="{{ route('products.index') }}" class="inline-block bg-white text-blue-600 font-semibold py-2 px-6 border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition duration-300">
                                Lihat Semua Produk
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Section 4: Testimoni -->
                <section class="py-16 bg-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 class="text-3xl font-bold text-center mb-12">Apa Kata Pelanggan Kami?</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Testimoni 1 -->
                            <div class="testimonial-card p-6 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden mr-4">
                                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Customer" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Sarah Wijaya</h4>
                                        <div class="flex text-yellow-400">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600">"Produknya berkualitas tinggi dan pengiriman sangat cepat. Saya sangat puas dengan layanan yang diberikan!"</p>
                            </div>
                            
                            <!-- Testimoni 2 -->
                            <div class="testimonial-card p-6 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden mr-4">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Customer" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Budi Santoso</h4>
                                        <div class="flex text-yellow-400">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600">"Harga kompetitif dan kualitas produk sesuai dengan deskripsi. Pasti akan belanja lagi di sini."</p>
                            </div>
                            
                            <!-- Testimoni 3 -->
                            <div class="testimonial-card p-6 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden mr-4">
                                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Customer" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Dewi Lestari</h4>
                                        <div class="flex text-yellow-400">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600">"Pelayanan customer service sangat ramah dan membantu. Packaging juga rapi dan aman. Recommended banget!"</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section 5: Kontak -->
                <section class="contact-section py-16">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h2 class="text-3xl font-bold text-center mb-12">Hubungi Kami</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div>
                                <h3 class="text-xl font-semibold mb-4">Informasi Kontak</h3>
                                <p class="text-gray-600 mb-6">Kami siap membantu Anda dengan segala pertanyaan dan kebutuhan belanja Anda.</p>
                                
                                <div class="flex items-start mb-4">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Alamat</h4>
                                        <p class="text-gray-600">Jl. Merdeka No. 123, Jakarta Pusat</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start mb-4">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Telepon</h4>
                                        <p class="text-gray-600">+62 21 1234 5678</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start mb-4">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Email</h4>
                                        <p class="text-gray-600">info@ecommerce.com</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold mb-4">Kirim Pesan</h3>
                                <form>
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                                        <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                                        <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div class="mb-4">
                                        <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                                        <textarea id="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                    </div>
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
                                        Kirim Pesan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800 text-white py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div>
                            <h3 class="text-xl font-bold mb-4">Toko Kami</h3>
                            <p class="text-gray-400">Menyediakan berbagai produk berkualitas dengan harga terbaik untuk kebutuhan sehari-hari Anda.</p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Syarat & Ketentuan</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Hubungi Kami</a></li>
                            </ul>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Layanan Pelanggan</h3>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Bantuan</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Cara Pembelian</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Pengembalian</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition">Status Pesanan</a></li>
                            </ul>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                </a>
                            </div>
                            <div class="mt-6">
                                <h4 class="text-lg font-semibold mb-2">Berlangganan Newsletter</h4>
                                <div class="flex">
                                    <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-lg w-full text-gray-800 focus:outline-none">
                                    <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-r-lg transition">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                        <p>&copy; 2023 Nama Toko Anda. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>