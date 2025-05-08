@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<div class="show-container">
    <div class="product-page">

        <div class="product-left">
            <div class="product-image">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            </div>
        </div>

        <div class="product-right">
            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>
                <p class="product-description"><strong>Description: </strong>{{ $product->description }}</p>
                <p class="product-description"><strong>Delivery:</strong>
                    The goods are ready to be shipped from Latvia within 1-2 business days.
                        All orders are carefully packed, have a tracking number and are easy to track within the EU: 17track.net or track-trace.com/post.
                    USA: USPS.com.
                </p>
                @if($product->discount)
                <p class="product-price">Price: 
                    <span style="text-decoration: line-through;">{{ $product->price }} €</span>
                    <strong>
                    {{ number_format($product->price * (1 - $product->discount / 100), 2) }} €
                    </strong>
                </p>
            @else
                <p class="product-price">Price: €{{ number_format($product->price, 2) }}</p>
            @endif

                <form action="{{ route('cart.store') }}" method="POST" class="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="quantity-container">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" value="1" min="1" id="quantity" class="quantity-input">
                    </div>
                    <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <div class="reviews-section">
        <h2>Reviews:</h2>
        @foreach($product->reviews as $review)
            <div class="review-card">
            <img src="{{ $review->user->profile_picture ? asset('storage/' . $review->user->profile_picture) : asset('images/default-avatar.png') }}"
            alt="{{ $review->user->name }}" class="review-avatar">
                <strong>{{ $review->user->name }}</strong> rated <span class="review-rating">{{ $review->rating }} Stars</span>
                <p class="review-comment">{{ $review->comment }}</p>
                <small class="review-date">Posted on {{ $review->created_at->format('d M Y') }}</small>
            </div>
        @endforeach

        @if(auth()->check())
            <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="review-form">
                @csrf
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select name="rating" id="rating" class="rating" required>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="submit-review-btn">Submit Review</button>
            </form>
        @endif
    </div>
</div>
@endsection
