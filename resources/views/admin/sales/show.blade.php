{{-- @extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Sale Details</h2>

    <div class="card p-3">
        <p><strong>Customer:</strong> {{ $sale->customer->name ?? 'N/A' }}</p>
        <p><strong>Total Amount:</strong> {{ $sale->total_amount }}</p>
        <p><strong>Sale Date:</strong> {{ $sale->sale_date }}</p>
        <p><strong>Created At:</strong> {{ $sale->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <a href="{{ route('admin.sales.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection --}}


@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h3>Sale #{{ $sale->id }}</h3>
        <a href="{{ route('admin.sales.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Back
        </a>
    </div>

    <div class="mb-3">
        <p><strong>Customer:</strong> {{ $sale->customer->name ?? '-' }}</p>
        <p><strong>Sale Date:</strong> {{ $sale->sale_date->format('Y-m-d') }}</p>
        <p><strong>Total Amount:</strong> {{ number_format($sale->total_amount, 2) }}</p>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sale->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->product->name ?? '-' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
