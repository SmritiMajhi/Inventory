@extends('staff.layouts.app')
@section('title', 'Edit Setting')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Edit Setting</h3>
        <form action="{{ route('staff.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control">
                @if($setting->logo)
                    <img src="{{ asset('uploads/settings/'.$setting->logo) }}" width="50" class="mt-2">
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control">{{ $setting->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Setting</button>
            <a href="{{ route('staff.settings.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
