@extends('layouts.app')

@section('content')
<h1>Add New Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Category:</label>
    <input type="text" name="category" required>

    <label>Price:</label>
    <input type="number" name="price" required>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <label>Image Filename:</label>
    <input type="text" name="image" required>

    <button type="submit">Add Product</button>
</form>
@endsection
