@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="profile-container">
    <h1>{{ Auth::user()->name }} Profile</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="profile-form" enctype="multipart/form-data">
        @csrf
        <h3>You can edit your profile information here</h3>

        <div class="form-group">
        <label for="profile_picture">Profile Picture:</label>
        @if($user->profile_picture)
        <p>Current photo: <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="100"></p>
        @endif
        <input type="file" name="profile_picture" id="profile_picture">
        @error('profile_picture')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-update">Change information</button>
    </form>

    <hr>

    <form method="POST" action="{{ route('profile.verify-password') }}" class="verify-password-form">
        @csrf
        <h3>Do you want to change your password?</h3>
        @if(session('password_verified'))
            <div class="success-message">{{ session('password_verified') }}</div>

            <div class="form-group">
                <label for="new_password">New password:</label>
                <input type="password" id="new_password" name="new_password" class="form-control">
                @error('new_password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="new_password_confirmation">Password confirmation:</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
            </div>

            <button type="submit" formaction="{{ route('profile.update-password') }}" class="btn-update">Save new password</button>
        @else

            <div class="form-group">
                <label for="password">Old password:</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn-update">Change password</button>
        @endif
    </form>

    <div class="form-container">
    <a href="{{ route('orders') }}" class="btn-update">View My Orders</a>
    </div>

    <div class="form-container">
        <form action="/logout" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>

        <form method="POST" action="{{ route('profile.destroy') }}" class="delete-form">
            @csrf
            <button type="submit" class="btn-delete" onclick="return confirm('Do you really want to delete your account?')">Delete account</button>
        </form>
    </div>
</div>


@endsection