@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Stock #{{ $stock->id }}</h3>

    <form action="{{ route('admin.stocks.update', $stock->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $stock->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Available Quantity</label>
            <input type="number" name="available_quantity" class="form-control" value="{{ $stock->available_quantity }}" min="0" required>
        </div>

        <button class="btn btn-success">Update Stock</button>
        <a href="{{ route('admin.stocks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
