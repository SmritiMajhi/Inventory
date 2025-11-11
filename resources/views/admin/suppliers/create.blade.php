@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Add Supplier</h3>
    <form action="{{ route('admin.suppliers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

        <button class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> Create</button>
        <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Cancel</a>
    </form>
</div>
@endsection
