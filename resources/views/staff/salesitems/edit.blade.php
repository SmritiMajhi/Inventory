@extends('staff.layouts.app')
@section('title', 'Edit Sale Item')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Edit Sale Item</h3>
        <form action="{{ route('staff.salesitems.update', $salesitem->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Sale</label>
                <select name="sale_id" class="form-select" required>
                    @foreach($sales as $sale)
                        <option value="{{ $sale->id }}" {{ $salesitem->sale_id == $sale->id ? 'selected' : '' }}>
                            #{{ $sale->id }} - {{ $sale->customer->name ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Product</label>
                <select name="product_id" class="form-select" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $salesitem->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" min="1" value="{{ $salesitem->quantity }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ $salesitem->price }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update Item</button>
            <a href="{{ route('staff.salesitems.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
