@extends('staff.layouts.app')
@section('title', 'Add Customer')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h4>Add Customer</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('staff.customers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control">{{ old('address') }}</textarea>
            </div>
            <button class="btn btn-success">Save Customer</button>
            <a href="{{ route('staff.customers.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
