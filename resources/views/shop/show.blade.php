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

    <form action="{{ route('cart.store') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit">Add to Cart</button>
</form>

<h2>Reviews:</h2>
@foreach($product->reviews as $review)
    <div>
        <strong>{{ $review->user->name }}</strong> rated {{ $review->rating }} Stars
        <p>{{ $review->comment }}</p>
        <small>Posted on {{ $review->created_at->format('d M Y') }}</small>
    </div>
@endforeach


@if(auth()->check())
    <form action="{{ route('reviews.store', $product->id) }}" method="POST">
        @csrf
        <label for="rating">Rating:</label>
        <select name="rating" id="rating" class="rating" required>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>

        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" rows="3" required></textarea>

        <button type="submit">Submit Review</button>
    </form>
@endif


</div>
@endsection
