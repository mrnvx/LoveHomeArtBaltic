<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
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
});

Route::resource('contact', ContactController::class);

Route::get('/test-view', [ContactController::class, 'test_view']);
Route::post('/contact', [ContactController::class, 'post_message'])->name('contact.post_message');

Route::get('/check-auth', function () {
    return response()->json(['isLoggedIn' => auth()->check()]);
});