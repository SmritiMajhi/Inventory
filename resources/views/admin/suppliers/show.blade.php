@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>View Supplier</h3>

    <div class="card mt-3">
        <div class="card-header">
            Supplier Details
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $supplier->id }}</p>
            <p><strong>Name:</strong> {{ $supplier->name }}</p>
            <p><strong>Email:</strong> {{ $supplier->email ?? '-' }}</p>
            <p><strong>Phone:</strong> {{ $supplier->phone ?? '-' }}</p>
            <p><strong>Address:</strong> {{ $supplier->address ?? '-' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle me-1"></i> Back</a>
            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square me-1"></i> Edit</a>
        </div>
    </div>
</div>
@endsection
