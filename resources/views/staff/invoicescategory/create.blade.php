@extends('staff.layouts.app')
@section('title', 'Add Invoice Category')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Add Invoice Category</h3>
        <form action="{{ route('staff.invoicescategory.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save Category</button>
            <a href="{{ route('staff.invoicescategory.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
