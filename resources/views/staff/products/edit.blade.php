@extends('staff.layouts.app')
@section('title', 'Edit Product')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Edit Product</h3>
        <form action="{{ route('staff.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id==$product->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Supplier</label>
                <select name="supplier_id" class="form-select" required>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if($supplier->id==$product->supplier_id) selected @endif>{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Buy Price</label>
                <input type="number" name="buy_price" class="form-control" value="{{ $product->buy_price }}" step="0.01" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sell Price</label>
                <input type="number" name="sell_price" class="form-control" value="{{ $product->sell_price }}" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-success">Update Product</button>
            <a href="{{ route('staff.products.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
