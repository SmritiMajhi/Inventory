@extends('staff.layouts.app')
@section('title', 'Customers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Customers</h3>
    <a href="{{ route('staff.customers.create') }}" class="btn btn-success">Add Customer</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email ?? '-' }}</td>
                    <td>{{ $customer->phone ?? '-' }}</td>
                    <td>{{ $customer->address ?? '-' }}</td>
                    <td>
                        <a href="{{ route('staff.customers.show', $customer->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('staff.customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('staff.customers.destroy', $customer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No customers found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
