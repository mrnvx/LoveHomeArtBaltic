@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="product-container">
    <h1>Search Results for "{{ $query }}"</h1>

    @if($products->isEmpty())
        <p>No products found matching your query.</p>
    @else
    <div class="product-grid">
        @foreach($products as $product)
            <div class="product-card">
            @if($product->discount)
                    <div class="discount-badge">
                        -{{ $product->discount }}%
                    </div>
                @endif
                <a href="{{ route('shop.show', $product->id) }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-image">
                </a>
                <div class="product-details">
                    <h2 class="product-name">{{ $product->name }}</h2>
                    @if($product->discount)
                <p class="product-price">
                    <span style="text-decoration: line-through; ">Price:  {{ $product->price }} €</span>
                    <br>
                    {{ number_format($product->price * (1 - $product->discount / 100), 2) }} €
    
                </p>
            @else
            <p class="product-price">Price: €{{ number_format($product->price, 2) }}</p>
            @endif
                    <div class="product-actions">
                        @if(auth()->check() && auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="button edit">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button delete">Delete</button>
                            </form>
                        @else
                            <a href="{{ route('shop.show', $product->id) }}" class="button view">View Details</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
