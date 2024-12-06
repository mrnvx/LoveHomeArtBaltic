@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="cart-container">

<div class="checkout-container">
    <h1>Checkout</h1>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>
        </div>

        <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <h3>Total: ${{ $total }}</h3>

        <button type="submit">Place Order</button>
    </form>
</div>
@endsection
