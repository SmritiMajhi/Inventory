@extends('staff.layouts.app')
@section('title', 'Products List')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Products</h2>
        <a href="{{ route('staff.products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
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
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>Rs. {{ number_format($product->buy_price, 2) }}</td>
                    <td>Rs. {{ number_format($product->sell_price, 2) }}</td>
                    <td>
                        <a href="{{ route('staff.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('staff.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                            Delete
                        </button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('staff.products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Product #{{ $product->id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($products->isEmpty())
            <p class="text-center my-3">No products found.</p>
        @endif
    </div>
</div>
@endsection
