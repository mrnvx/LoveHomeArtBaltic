<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/verify-password', [ProfileController::class, 'verifyPassword'])->name('profile.verify-password');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', [OrderController::class, 'userOrders'])->name('orders');

});

Route::resource('contact', ContactController::class);

Route::get('/test-view', [ContactController::class, 'test_view']);
Route::post('/contact', [ContactController::class, 'post_message'])->name('contact.post_message');

Route::get('/check-auth', function () {
    return response()->json(['isLoggedIn' => auth()->check()]);
});

Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ProductController::class, 'show'])->name('shop.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update');

});

Route::get('/search', [ProductController::class, 'search'])->name('shop.search');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); 
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/category/{id}', [ProductController::class, 'filterByCategory'])->name('category.filter');


