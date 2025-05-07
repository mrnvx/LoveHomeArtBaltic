@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="new-product-container">
    <h1 class="new-product-title">Create New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="new-product-form">
        @csrf

        <div class="new-form-group">
            <label for="category_id" class="new-form-label">Kategorija</label>
                <select name="category_id" id="category_id" required>
                 @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="new-form-group">
            <label for="name" class="new-form-label">Product Name</label>
            <input type="text" name="name" id="name" class="new-form-input" placeholder="Enter product name" required>
        </div>

        <div class="new-form-group">
            <label for="price" class="new-form-label">Price ($)</label>
            <input type="number" name="price" id="price" class="new-form-input" step="0.01" placeholder="Enter product price" required>
        </div>

        <div class="new-form-group">
            <label for="description" class="new-form-label">Description</label>
            <textarea name="description" id="description" class="new-form-textarea" rows="5" placeholder="Enter product description"></textarea>
        </div>

        <div class="new-form-group">
            <label for="image" class="new-form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="new-form-input">
        </div>

        <div class="new-form-actions">
            <button type="submit" class="new-save-btn">Save Product</button>
        </div>
    </form>
</div>
@endsection
