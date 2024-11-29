@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<div class="product-details">
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    <p>{{ $product->description }}</p>
    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>

    <form action="#" method="POST">
        @csrf
        <button type="submit">Add to Cart</button>
    </form>
</div>
@endsection
