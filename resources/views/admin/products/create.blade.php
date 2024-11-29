@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<h1>Create New Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" step="0.01" required>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
    </div>

    <button type="submit">Save Product</button>
</form>
@endsection
