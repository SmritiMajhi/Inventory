@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Customer Details</h3>

    <div class="card mt-3">
        <div class="card-header">
            <strong>{{ $customer->name }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}</p>
            <p><strong>Created At:</strong> {{ $customer->created_at->format('d M Y') }}</p>
            <p><strong>Updated At:</strong> {{ $customer->updated_at->format('d M Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle me-1"></i> Back</a>
            <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i> Edit</a>
        </div>
    </div>
</div>
@endsection
