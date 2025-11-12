@extends('staff.layouts.app')
@section('title', 'Sale Items')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sale Items</h2>
        <a href="{{ route('staff.salesitems.create') }}" class="btn btn-primary">Add New Item</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Sale</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>#{{ $item->sale->id ?? 'N/A' }}</td>
                <td>{{ $item->product->name ?? 'N/A' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rs. {{ number_format($item->price, 2) }}</td>
                <td>Rs. {{ number_format($item->subtotal, 2) }}</td>
                <td>
                    <a href="{{ route('staff.salesitems.show', $item->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('staff.salesitems.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('staff.salesitems.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No sale items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
