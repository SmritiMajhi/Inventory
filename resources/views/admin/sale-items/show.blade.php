@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Sale Item #{{ $saleItem->id }}</h3>

    <div class="mb-3">
        <strong>Sale ID:</strong> {{ $saleItem->sale->id }}
    </div>
    <div class="mb-3">
        <strong>Customer:</strong> {{ $saleItem->sale->customer->name ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Product:</strong> {{ $saleItem->product->name ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Quantity:</strong> {{ $saleItem->quantity }}
    </div>
    <div class="mb-3">
        <strong>Price:</strong> {{ number_format($saleItem->price, 2) }}
    </div>
    <div class="mb-3">
        <strong>Subtotal:</strong> {{ number_format($saleItem->subtotal, 2) }}
    </div>
    <div class="mb-3">
        <strong>Sale Date:</strong> {{ \Carbon\Carbon::parse($saleItem->sale->sale_date)->format('d-m-Y') }}
    </div>

    <a href="{{ route('admin.saleitems.index') }}" class="btn btn-secondary">Back to Sale Items</a>
</div>
@endsection
