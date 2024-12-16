@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<div class="cart-container">
    <h1 class="cart-title">Your Cart</h1>
    <a href="/shop" class="cart-continue-shopping">Continue Shopping</a>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p class="cart-empty">Your cart is currently empty!</p>
    @else
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                <tr class="cart-item">
                    <td class="cart-product">
                        <img src="{{ asset('storage/' . $cartItem->product->image) }}" 
                             alt="{{ $cartItem->product->name }}" class="cart-product-image">
                        <div class="cart-product-details">
                            <h3>{{ $cartItem->product->name }}</h3>
                            <p>${{ number_format($cartItem->product->price, 2) }}</p>
                        </div>
                    </td>
                    <td class="cart-quantity">
                        <div class="quantity-wrapper">
                                <p class="cart-input-quantity">{{ $cartItem->quantity }}</p>
                        </div>
                    </td>
                    <td class="cart-total">
                        ${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}
                        <form method="POST" action="{{ route('cart.destroy', $cartItem->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-btn">&times;</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-summary">
            <p>Subtotal: <strong>${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</strong></p>
            <p class="shipping-note">Taxes and shipping calculated at checkout.</p>
            <form method="GET" action="{{ route('checkout.index') }}">
                <button type="submit" class="checkout-btn">Proceed to Checkout</button>
            </form>
        </div>
    @endif
</div>
@endsection
