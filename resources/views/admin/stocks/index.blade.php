@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h3>Stock List</h3>
        <a href="{{ route('admin.stocks.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Add Stock</a>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stocks as $stock)
            <tr>
                <td>{{ $stock->id }}</td>
                <td>{{ $stock->product->name }}</td>
                <td>{{ $stock->available_quantity }}</td>
                <td>
                    <a href="{{ route('admin.stocks.show', $stock->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('admin.stocks.edit', $stock->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('admin.stocks.destroy', $stock->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this stock?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center">No stock records found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $stocks->links() }}
</div>
@endsection
