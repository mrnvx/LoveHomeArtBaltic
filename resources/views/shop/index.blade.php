@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<h1>Product List</h1>
@if(auth()->check() && auth()->user()->hasRole('admin'))
<a href="{{ route('admin.products.create') }}">Add New Product</a>
@endif
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td><a href="{{ route('shop.show', $product->id) }}"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;"></a></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}$</td>
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
