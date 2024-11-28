<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        return view('profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->hasFile('profile_picture')) {
            
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile data updated successfully');
    }

    public function verifyPassword(Request $request)
    {
        
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        
        return redirect()->back()->with('password_verified', 'Password confirmed. Enter new password.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        
        $validated = $request->validate([
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        
        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();

        
        $user->delete();

        return redirect('/home')->with('success', 'Your account has been successfully deleted.');
    }
}
