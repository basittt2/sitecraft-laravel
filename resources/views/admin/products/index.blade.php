@extends('layouts.app')

@section('content')
<h1>Product List (Admin)</h1>

<a href="{{ route('admin.products.create') }}" class="btn">Add New Product</a>

<table>
    <tr>
        <th>ID</th><th>Name</th><th>Category</th><th>Price</th><th>Actions</th>
    </tr>

    @foreach($products as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->category }}</td>
        <td>PKR {{ number_format($p->price) }}</td>
        <td>
            <a href="{{ route('admin.products.edit', $p->id) }}">Edit</a> |
            <a href="{{ route('admin.products.delete', $p->id) }}" onclick="return confirm('Delete product?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
