@extends('staff.layouts.app')
@section('title', 'Add Sale Item')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Add New Sale Item</h3>
        <form action="{{ route('staff.salesitems.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Sale</label>
                <select name="sale_id" class="form-select" required>
                    <option value="">Select Sale</option>
                    @foreach($sales as $sale)
                        <option value="{{ $sale->id }}">#{{ $sale->id }} - {{ $sale->customer->name ?? 'N/A' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Product</label>
                <select name="product_id" class="form-select" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" min="1" value="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" min="0" required>
            </div>

            <button type="submit" class="btn btn-success">Save Item</button>
            <a href="{{ route('staff.salesitems.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
