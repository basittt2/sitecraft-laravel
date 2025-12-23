@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ $product->name }}" required>

    <label>Category:</label>
    <input type="text" name="category" value="{{ $product->category }}" required>

    <label>Price:</label>
    <input type="number" name="price" value="{{ $product->price }}" required>

    <label>Description:</label>
    <textarea name="description">{{ $product->description }}</textarea>

    <label>Image Filename:</label>
    <input type="text" name="image" value="{{ $product->image }}" required>

    <button type="submit">Update</button>
</form>
@endsection
