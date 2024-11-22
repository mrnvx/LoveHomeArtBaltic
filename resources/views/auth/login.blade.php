@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="login-block">
<div class="login-container">

<div class="login-left">

    <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
             @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        @error('email')
            <div class="alert">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
        @error('password')
            <div class="alert">{{ $message }}</div>
        @enderror
    </div>

        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

<div class="login-right">
        <div class="image-container">
            <img src="{{ asset('images/drift.png') }}" alt="Driftwood">
        </div>
     <h2>Welcome to Driftwood!</h2>
        <p>"Where dreams take shape and ideas become reality."</p>
            <a href="{{ route('register') }}" class="btn-signup">Register here</a>
        </div>
    </div>
</div>
@endsection
