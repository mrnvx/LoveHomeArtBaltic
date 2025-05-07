@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="product-container">
    <h1 class="product-title">Product List</h1>

    @if(auth()->check() && auth()->user()->hasRole('admin'))
        <div class="add-product-btn">
            <a href="{{ route('admin.products.create') }}" class="button">Add New Product</a>
        </div>
    @endif

    <div class="product-grid">
    <form method="GET" action="{{ route('shop.index') }}">
        
    <input type="number" name="price_min" placeholder="Min cena" value="{{ request('price_min') }}">
    <input type="number" name="price_max" placeholder="Max cena" value="{{ request('price_max') }}">

    <select name="sort">
    <option value="">Sort by</option>
        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Cena ↑</option>
        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Cena ↓</option>
        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Jaunākie</option>
    </select>
   

    <button type="submit">Filtrēt</button>
    <a href="{{ route('shop.index') }}">Notīrīt filtrus</a>
    </form>
    <p>Kopā produkti: {{ $products->total() }}</p>

        @foreach($products as $product)
            <div class="product-card">
                <a href="{{ route('shop.show', $product->id) }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                </a>
                <div class="product-details">
                    <h2 class="product-name">{{ $product->name }}</h2>
                    <p class="product-price">${{ $product->price }}</p>
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
@endsection