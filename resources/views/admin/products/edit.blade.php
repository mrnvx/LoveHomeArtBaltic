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

        <div class="new-form-group">
            <label for="category_id" class="new-form-label">Kategorija</label>
            <select name="category_id" id="category_id" class="edit-form-input" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="edit-form-group">
            <label for="name" class="edit-form-label">Product Name</label>
            <input type="text" name="name" id="name" class="edit-form-input" value="{{ $product->name }}" required>
        </div>

        <div class="edit-form-group">
            <label for="price" class="edit-form-label">Price (€)</label>
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

         <div class="edit-form-group">
            <label for="discount" class="edit-form-label">Discount (%)</label>
            <input type="number" name="discount" id="discount" class="edit-form-input" value="{{ old('discount', $product->discount) }}" step="0.01" min="0" max="100">

            <div style="margin-top: 5px;">
                <input type="checkbox" name="remove_discount" id="remove_discount" value="1">
                <label for="remove_discount">Remove discount</label>
            </div>
        </div>

        <div class="edit-form-actions">
            <button type="submit" class="edit-update-btn">Update Product</button>
        </div>
    </form>
</div>
@endsection
