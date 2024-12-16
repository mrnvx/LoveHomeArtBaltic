@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="checkout-container">
    <h1 class="checkout-title">Checkout</h1>
    <div class="checkout-wrapper">


        <div class="checkout-form-container">
            <form action="{{ route('checkout.store') }}" method="POST" class="checkout-form">
                @csrf


                <div class="form-group">
                    <label for="address" class="form-label">Shipping Address:</label>
                    <input type="text" name="address" id="address" placeholder="Enter your full address" required class="form-input">
                </div>


                <div class="form-group">
                    <label for="payment_method" class="form-label">Payment Method:</label>
                    <select name="payment_method" id="payment_method" class="form-select" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <button type="submit" class="checkout-btn">Place Order</button>
            </form>
        </div>

        <div class="order-summary-container">
            <h3 class="order-summary-title">Your Order</h3>
            <ul class="order-summary-list">
                @foreach($cartItems as $item)
                    <li class="order-summary-item">
                        <div class="item-details">
                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                 alt="{{ $item->product->name }}" class="item-image">
                            <div>
                                <p class="item-name">{{ $item->product->name }}</p>
                                <p class="item-quantity">x{{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div class="item-price">${{ number_format($item->product->price * $item->quantity, 2) }}</div>
                    </li>
                @endforeach
            </ul>
            <div class="order-total">
                <p>Total: <span>${{ number_format($total, 2) }}</span></p>
            </div>
        </div>
    </div>
</div>
@endsection
