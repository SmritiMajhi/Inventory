@extends('staff.layouts.app')
@section('title', 'Sale Item Details')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Sale Item Details</h3>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $salesitem->id }}</td>
            </tr>
            <tr>
                <th>Sale</th>
                <td>#{{ $salesitem->sale->id ?? 'N/A' }} - {{ $salesitem->sale->customer->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Product</th>
                <td>{{ $salesitem->product->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $salesitem->quantity }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>Rs. {{ number_format($salesitem->price, 2) }}</td>
            </tr>
            <tr>
                <th>Subtotal</th>
                <td>Rs. {{ number_format($salesitem->subtotal, 2) }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $salesitem->created_at->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $salesitem->updated_at->format('d M Y') }}</td>
            </tr>
        </table>

        <a href="{{ route('staff.salesitems.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</div>
@endsection
