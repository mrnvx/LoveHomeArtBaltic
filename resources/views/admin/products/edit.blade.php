@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="edit-product-container">
    <h1 class="edit-product-title">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="edit-product-form">
        @csrf
        @method('PUT')

        <div class="edit-form-group">
            <label for="name" class="edit-form-label">Product Name</label>
            <input type="text" name="name" id="name" class="edit-form-input" value="{{ $product->name }}" required>
        </div>

        <div class="edit-form-group">
            <label for="price" class="edit-form-label">Price ($)</label>
            <input type="number" name="price" id="price" class="edit-form-input" step="0.01" value="{{ $product->price }}" required>
        </div>

        <div class="edit-form-group">
            <label for="description" class="edit-form-label">Description</label>
            <textarea name="description" id="description" class="edit-form-textarea" rows="5">{{ $product->description }}</textarea>
        </div>

        <div class="edit-form-group">
            <label for="image" class="edit-form-label">Update Image</label>
            <input type="file" name="image" id="image" class="edit-form-input">
        </div>

        <div class="edit-form-actions">
            <button type="submit" class="edit-update-btn">Update Product</button>
        </div>
    </form>
</div>
@endsection
