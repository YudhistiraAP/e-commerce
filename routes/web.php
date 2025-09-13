<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;


Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'index'])->name('products.index');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Link verifikasi sudah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// product detail (jika belum ada)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// cart routes (session-based)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// order routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// //dashboard routes

// Route::prefix('admin')
//     ->name('admin.')
//     ->middleware(['auth', 'admin'])
//     ->group(function () {
//         Route::get('/dashboard', [AdminDashboardController::class, 'index'])
//             ->name('dashboard');
//     });

//Admin Product route
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])   // pastikan alias 'admin' sudah terdaftar
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard'); // jika perlu
        Route::resource('products', AdminProductController::class);
});

//Admin Category Route

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::resource('categories', AdminCategoryController::class);
    });

//Admin Order Route

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::resource('orders', AdminOrderController::class)->only(['index','show','update']);
    });

//Admin order print

Route::get('/orders/{order}/print', [AdminOrderController::class, 'print'])->name('orders.print');

require __DIR__.'/auth.php';
