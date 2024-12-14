@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
    <h1>My Order History</h1>

    @if($orders->isEmpty())
        <p>You have not placed any orders yet.</p>
    @else
        @foreach($orders as $order)
            <div class="order">
                <h2>Order #{{ $order->id }}</h2>
                <p>Status: {{ ucfirst($order->status) }}</p>
                <p>Total Price: ${{ $order->total_price }}</p>
                <ul>
                    @foreach($order->items as $item)
                        <li>
                            {{ $item->product->name }} - Quantity: {{ $item->quantity }} - Subtotal: ${{ $item->total_price }}
                        </li>
                    @endforeach
                </ul>
                <p>Ordered on: {{ $order->created_at->format('d M Y') }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection
