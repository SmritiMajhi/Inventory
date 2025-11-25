@extends('staff.layouts.app')

@section('content')
<div class="container mt-3"> <!-- Reduced from mt-5 to mt-3 -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 fw-bold" style="font-size: 1.5rem;">
                        <i class="bi bi-gear-fill me-2"></i>Company Settings
                    </h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('staff.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Company Name -->
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="font-size: 1rem;">Company Name</label>
                            <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name ?? '' }}" required>
                        </div>

                        <!-- Logo -->
                        <div class="mb-4 d-flex align-items-center gap-3 flex-wrap">
                            <div class="flex-grow-1">
                                <label class="form-label fw-bold" style="font-size: 1rem;">Logo</label>
                                <input type="file" name="logo" class="form-control">
                            </div>
                            @if(!empty($setting->logo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($setting->logo))
                                <div>
                                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($setting->logo) }}" alt="Logo" class="img-thumbnail" width="120">
                                </div>
                            @elseif(!empty($setting->logo))
                                <div>
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-thumbnail" width="120">
                                </div>
                            @endif
                        </div>

                        <!-- Email & Phone in same row -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold" style="font-size: 1rem;">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $setting->email ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold" style="font-size: 1rem;">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $setting->phone ?? '' }}">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="font-size: 1rem;">Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg fw-bold" style="font-size: 1.1rem;">
                                <i class="bi bi-check-circle me-2"></i>Update Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
