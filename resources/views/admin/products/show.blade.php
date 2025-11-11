@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Product Details</h3>

    <div class="card mt-3">
        <div class="card-header">
            <strong>{{ $product->name }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Category:</strong> {{ $product->category->name }}</p>
            <p><strong>Supplier:</strong> {{ $product->supplier->name }}</p>
            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
            <p><strong>Buy Price:</strong> ${{ $product->buy_price }}</p>
            <p><strong>Sell Price:</strong> ${{ $product->sell_price }}</p>
            <p><strong>Created At:</strong> {{ $product->created_at->format('d M Y') }}</p>
            <p><strong>Updated At:</strong> {{ $product->updated_at->format('d M Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Back to Products</a>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
        </div>
    </div>
</div>
@endsection
