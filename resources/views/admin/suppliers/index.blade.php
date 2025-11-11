@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h3>Suppliers</h3>
        <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Add Supplier</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->address }}</td>
                <td>
                    <!-- View button -->
                    <a href="{{ route('admin.suppliers.show', $supplier->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>

                    <!-- Edit button -->
                    <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>

                    <!-- Delete button -->
                    <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this supplier?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No suppliers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $suppliers->links() }}
</div>
@endsection
