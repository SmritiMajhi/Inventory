@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Invoice #{{ $sale->id }}</h3>
        <button class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Invoice</button>
    </div>

    <div class="card p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5>Customer Info</h5>
                <p><strong>Name:</strong> {{ $sale->customer->name ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $sale->customer->email ?? '-' }}</p>
            </div>
            <div class="col-md-6 text-end">
                <h5>Sale Info</h5>
                <p><strong>Invoice No:</strong> #{{ $sale->id }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($sale->sale_date)->format('d-m-Y') }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($sale->total_amount, 2) }}</p>
            </div>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->product->name ?? '-' }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end mt-3">
            <h5>Total: ${{ number_format($sale->total_amount, 2) }}</h5>
        </div>
    </div>
</div>
@endsection
