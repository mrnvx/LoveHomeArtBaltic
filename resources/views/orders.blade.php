@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="order-history-container">
    <h1 class="order-history-title">My Order History</h1>

    @if($orders->isEmpty())
        <p class="no-orders-message">You have not placed any orders yet.</p>
    @else
        @foreach($orders as $order)
            <div class="order-card">
                <h2 class="order-card-title">Order #{{ $order->id }}</h2>
                <p class="order-status">Status: <span class="status-{{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span></p>
                
                <ul class="order-items-list">
                    @foreach($order->items as $item)
                        <li class="order-item">
                            <p class="item-name">{{ $item->product->name }}</p> 
                            <p class="item-quantity">Quantity: {{ $item->quantity }}</p>
                        </li>
                    @endforeach
                </ul>
                <p class="order-total">Total Price: <strong>${{ $order->total_price }}</strong></p>

                <p class="order-date">Ordered on: {{ $order->created_at->format('d M Y') }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection

