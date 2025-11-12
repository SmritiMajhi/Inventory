@extends('staff.layouts.app')
@section('title', 'Add Setting')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Add New Setting</h3>
        <form action="{{ route('staff.settings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save Setting</button>
            <a href="{{ route('staff.settings.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
