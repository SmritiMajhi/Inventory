@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h3>Products</h3>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Add Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Buy Price</th>
                <th>Sell Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->supplier->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->buy_price }}</td>
                <td>{{ $product->sell_price }}</td>
                <td>

                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection
