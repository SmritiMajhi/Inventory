@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Add Category</h3>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Create
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            <i class="bi bi-x-circle me-1"></i> Cancel
        </a>
    </form>
</div>
@endsection
