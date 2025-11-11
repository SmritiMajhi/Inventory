@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Product</h3>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="buy_price">Buy Price</label>
            <input type="number" step="0.01" name="buy_price" class="form-control" value="{{ $product->buy_price }}" required>
        </div>

        <div class="mb-3">
            <label for="sell_price">Sell Price</label>
            <input type="number" step="0.01" name="sell_price" class="form-control" value="{{ $product->sell_price }}" required>
        </div>

        <button class="btn btn-success"><i class="bi bi-pencil-square me-1"></i> Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Cancel</a>
    </form>
</div>
@endsection
