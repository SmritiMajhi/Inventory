@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Sale Items</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sale ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Sale Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($saleItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->sale->id }}</td>
                <td>{{ $item->sale->customer->name ?? '-' }}</td>
                <td>{{ $item->product->name ?? '-' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ number_format($item->subtotal, 2) }}</td>
                <td>{{ \Carbon\Carbon::parse($item->sale->sale_date)->format('d-m-Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No sale items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $saleItems->links() }}
</div>
@endsection
