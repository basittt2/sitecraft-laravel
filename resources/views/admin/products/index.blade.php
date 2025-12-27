@extends('layouts.app')

@section('content')
<style>
    .admin-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .admin-header h1 {
        margin: 0;
        color: #2c3e50;
        font-weight: 600;
    }

    .btn-add {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #fff;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-add:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    th, td {
        padding: 12px 14px;
        text-align: left;
    }

    thead {
        background: #f4f6f8;
    }

    th {
        color: #34495e;
        font-weight: 600;
        font-size: 14px;
    }

    tbody tr {
        border-bottom: 1px solid #eee;
    }

    tbody tr:hover {
        background: #fafafa;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-edit {
        background: #4f46e5;
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 13px;
    }

    .btn-delete {
        background: #ef4444;
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-size: 13px;
    }

    .btn-edit:hover,
    .btn-delete:hover {
        opacity: 0.85;
    }

    form {
        margin: 0;
    }
</style>

<div class="admin-container">

    <div class="admin-header">
        <h1>Product List (Admin)</h1>
        <a href="{{ route('admin.products.create') }}" class="btn-add">
            + Add New Product
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th width="160">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category }}</td>
                <td>PKR {{ number_format($p->price) }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('admin.products.destroy', $p->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
