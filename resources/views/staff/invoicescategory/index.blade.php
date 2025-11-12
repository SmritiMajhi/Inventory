@extends('staff.layouts.app')
@section('title', 'Invoice Categories')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Invoice Categories</h2>
        <a href="{{ route('staff.invoicescategory.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    <table class="table table-hover shadow-sm rounded">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('staff.invoicescategory.show', $category->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('staff.invoicescategory.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('staff.invoicescategory.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($categories->isEmpty())
        <p class="text-center mt-3">No categories found.</p>
    @endif
</div>
@endsection
