@extends('staff.layouts.app')
@section('title', 'Product Details')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Product Details</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
            <li class="list-group-item"><strong>Name:</strong> {{ $product->name }}</li>
            <li class="list-group-item"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</li>
            <li class="list-group-item"><strong>Supplier:</strong> {{ $product->supplier->name ?? 'N/A' }}</li>
            <li class="list-group-item"><strong>Quantity:</strong> {{ $product->quantity }}</li>
            <li class="list-group-item"><strong>Buy Price:</strong> Rs. {{ number_format($product->buy_price, 2) }}</li>
            <li class="list-group-item"><strong>Sell Price:</strong> Rs. {{ number_format($product->sell_price, 2) }}</li>
        </ul>
        <a href="{{ route('staff.products.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
</div>
@endsection
