@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h3>Purchases</h3>
        <a href="{{ route('admin.purchases.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Purchase
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Purchase Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($purchases as $purchase)
            <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->product->name }}</td>
                <td>{{ $purchase->quantity }}</td>
                <td>{{ $purchase->price }}</td>
                <td>{{ $purchase->purchase_date }}</td>
                <td>
                    <a href="{{ route('admin.purchases.show', $purchase->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('admin.purchases.edit', $purchase->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('admin.purchases.destroy', $purchase->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this purchase?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No purchases found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $purchases->links() }}
</div>
@endsection
