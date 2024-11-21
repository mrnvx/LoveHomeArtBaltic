<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Получаем текущего пользователя
        $user = Auth::user();

        // Возвращаем представление профиля с данными пользователя
        return view('profile', compact('user'));
    }
}
