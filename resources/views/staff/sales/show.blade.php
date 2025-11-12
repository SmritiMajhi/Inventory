@extends('staff.layouts.app')
@section('title', 'Sale Details')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Sale Details #{{ $sale->id }}</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Customer:</strong> {{ $sale->customer->name ?? 'N/A' }}</li>
            <li class="list-group-item"><strong>Total Amount:</strong> Rs. {{ number_format($sale->total_amount,2) }}</li>
            <li class="list-group-item"><strong>Sale Date:</strong> {{ $sale->sale_date->format('d M Y') }}</li>
            <li class="list-group-item"><strong>Created At:</strong> {{ $sale->created_at->format('d M Y H:i') }}</li>
            <li class="list-group-item"><strong>Updated At:</strong> {{ $sale->updated_at->format('d M Y H:i') }}</li>
        </ul>
        <a href="{{ route('staff.sales.index') }}" class="btn btn-secondary mt-3">Back to Sales</a>
    </div>
</div>
@endsection
