@extends('layouts.app')

@section('content')
<style>
    .edit-product-container {
        max-width: 700px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px 35px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .edit-product-container h1 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 600;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: #34495e;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #dcdcdc;
        font-size: 14px;
        transition: 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #4f46e5;
        outline: none;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }

    .btn-update {
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: #fff;
        border: none;
        padding: 10px 22px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: 0.3s ease;
    }

    .btn-update:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    .btn-back {
        text-decoration: none;
        color: #4f46e5;
        font-weight: 500;
        font-size: 14px;
    }

    .btn-back:hover {
        text-decoration: underline;
    }
</style>

<div class="edit-product-container">
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" value="{{ $product->category }}" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Image (URL or Filename)</label>
            <input type="text" name="image" value="{{ $product->image }}" required>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.products.index') }}" class="btn-back">
                ← Back to Products
            </a>

            <button type="submit" class="btn-update">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
