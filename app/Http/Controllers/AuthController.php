<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput(); 
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);


        Auth::login($user);

      
        return redirect("/profile");
    }


    public function showLogin()
    {
        return view('auth.login');
    }

 
    public function login(Request $request)
    {
    
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            return redirect()->intended('home');
        }

    
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('home');
    }
}
