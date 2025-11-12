@extends('layouts.app')
@section('title', 'Customer Details')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Customer Details</h4>
        <a href="{{ route('staff.customers.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Email:</strong> {{ $customer->email ?? '-' }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone ?? '-' }}</p>
        <p><strong>Address:</strong> {{ $customer->address ?? '-' }}</p>
        <p><strong>Created At:</strong> {{ $customer->created_at->format('d M, Y H:i') }}</p>
        <p><strong>Updated At:</strong> {{ $customer->updated_at->format('d M, Y H:i') }}</p>
    </div>
</div>
@endsection
