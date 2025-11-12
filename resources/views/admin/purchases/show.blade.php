@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Purchase Details</h3>

    <div class="card mt-3">
        <div class="card-header">
            Purchase #{{ $purchase->id }}
        </div>
        <div class="card-body">
            <p><strong>Product:</strong> {{ $purchase->product->name }}</p>
            <p><strong>Quantity:</strong> {{ $purchase->quantity }}</p>
            <p><strong>Price:</strong> {{ $purchase->price }}</p>
            <p><strong>Purchase Date:</strong> {{ $purchase->purchase_date }}</p>
            <p><strong>Created At:</strong> {{ $purchase->created_at->format('d M Y') }}</p>
            <p><strong>Updated At:</strong> {{ $purchase->updated_at->format('d M Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle me-1"></i> Back</a>
            <a href="{{ route('admin.purchases.edit', $purchase->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i> Edit</a>
        </div>
    </div>
</div>
@endsection
