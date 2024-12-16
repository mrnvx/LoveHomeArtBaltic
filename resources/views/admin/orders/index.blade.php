@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="orders-container">
    <h1 class="orders-title">Orders</h1>

    <table class="orders-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Total Price</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Created At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="order-row">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>${{ $order->total_price }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="status-form">
                            @csrf
                            <select name="status" class="status-select">
                                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Sent" {{ $order->status == 'Sent' ? 'selected' : '' }}>Sent</option>
                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                            <button type="submit" class="update-status-btn">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
