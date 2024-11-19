<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('contact', ContactController::class);


Route::get('/test-view', [ContactController::class, 'test_view']);
Route::post('/contact', [ContactController::class, 'post_message'])->name('contact.post_message');
