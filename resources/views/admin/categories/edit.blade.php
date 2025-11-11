@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Category</h3>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $category->description }}</textarea>
        </div>

        <button class="btn btn-success">
            <i class="bi bi-check-circle me-1"></i> Update
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            <i class="bi bi-x-circle me-1"></i> Cancel
        </a>
    </form>
</div>
@endsection
