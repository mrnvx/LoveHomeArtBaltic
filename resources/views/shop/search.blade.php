@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="search-results-container">
    <h1>Search Results for "{{ $query }}"</h1>

    @if($products->isEmpty())
        <p>No products found matching your query.</p>
    @else
        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>${{ $product->price }}</p>
                    <a href="{{ route('shop.show', $product->id) }}">View Details</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
