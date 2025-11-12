@extends('staff.layouts.app')
@section('title', 'View Setting')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">View Setting</h3>
        <p><strong>Company Name:</strong> {{ $setting->company_name }}</p>
        @if($setting->logo)
        <p><strong>Logo:</strong> <img src="{{ asset('uploads/settings/'.$setting->logo) }}" width="100"></p>
        @endif
        <p><strong>Email:</strong> {{ $setting->email }}</p>
        <p><strong>Phone:</strong> {{ $setting->phone }}</p>
        <p><strong>Address:</strong> {{ $setting->address }}</p>

        <a href="{{ route('staff.settings.edit', $setting->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('staff.settings.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
