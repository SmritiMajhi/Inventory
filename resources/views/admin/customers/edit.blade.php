@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Customer</h3>
    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
        </div>
        <button class="btn btn-success"><i class="bi bi-check-circle me-1"></i> Update</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Cancel</a>
    </form>
</div>
@endsection
