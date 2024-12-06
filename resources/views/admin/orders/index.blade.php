@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<h1>Orders</h1>

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total Price</th>
            <th>Address</th>
            <th>Payment Method</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>${{ $order->total_price }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
