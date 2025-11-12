@extends('staff.layouts.app')
@section('title', 'Settings List')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Settings</h2>
        <a href="{{ route('staff.settings.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Setting
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive shadow-sm rounded-4">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($settings as $setting)
                <tr>
                    <td>{{ $setting->id }}</td>
                    <td>{{ $setting->company_name }}</td>
                    <td>{{ $setting->email ?? '—' }}</td>
                    <td>{{ $setting->phone ?? '—' }}</td>
                    <td>
                        @if($setting->logo)
                            <img src="{{ asset($setting->logo) }}" alt="Logo" width="60" height="60" class="rounded shadow-sm border">
                        @else
                            <span class="text-muted">No Logo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('staff.settings.show', $setting->id) }}" class="btn btn-info btn-sm me-1">View</a>
                        <a href="{{ route('staff.settings.edit', $setting->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('staff.settings.destroy', $setting->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this setting?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No settings found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
