<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('contact', ContactController::class);

Route::post('/contact', [ContactController::class, 'post_message']);
