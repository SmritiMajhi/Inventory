{{-- @extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Sales List</h2>

    <a href="{{ route('admin.sales.create') }}" class="btn btn-primary mb-3">Add New Sale</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Total Amount</th>
                <th>Sale Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->customer->name ?? 'N/A' }}</td>
                <td>{{ $sale->total_amount }}</td>
                <td>{{ $sale->sale_date }}</td>
                <td>
                    <a href="{{ route('admin.sales.show', $sale->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this sale?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sales->links() }}
</div>
@endsection --}}



@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h3>Sales</h3>
        <a href="{{ route('admin.sales.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Sale
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Sale Date</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->customer->name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d-m-Y') }}</td>
                <td>{{ number_format($sale->total_amount, 2) }}</td>
                <td>
                    <a href="{{ route('admin.sales.show', $sale->id) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('admin.sales.edit', $sale->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                        <a href="{{ route('admin.sales.invoice', $sale->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-receipt"></i></a>

                    <form action="{{ route('admin.sales.destroy', $sale->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this sale?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No sales found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $sales->links() }}
</div>
@endsection
