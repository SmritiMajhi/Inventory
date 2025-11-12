@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Add Stock</h3>

    <form action="{{ route('admin.stocks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-select" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Available Quantity</label>
            <input type="number" name="available_quantity" class="form-control" min="0" required>
        </div>

        <button class="btn btn-success">Add Stock</button>
        <a href="{{ route('admin.stocks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
