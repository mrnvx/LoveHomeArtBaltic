@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="cart-container">

    <h1>Your Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
            <p>Your cart is empty!</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                        <tr>
                        <td><img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" style="max-width: 100px; max-height: 100px;"></td>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>${{ $cartItem->product->price }}</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>${{ $cartItem->product->price * $cartItem->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                        </td>
                        @if(!$cartItems->isEmpty())
    <form action="{{ route('checkout.index') }}" method="GET">
        <button type="submit">Proceed to Checkout</button>
    </form>
@endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
