@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">⚙️ Admin Settings</h5>
                </div>

                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" class="form-control"
                                        value="{{ $setting->company_name ?? '' }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $setting->email ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $setting->phone ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">Current Logo</label><br>

                                    @if(!empty($setting->logo))
                                        <div class="border rounded p-2 bg-light text-center" style="width: 200px;">
                                            <img src="{{ asset('uploads/settings/'.$setting->logo) }}"
                                                 class="img-fluid"
                                                 style="max-height: 150px;">
                                        </div>
                                    @else
                                        <p class="text-muted">No logo uploaded</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Upload New Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                    <small class="text-muted">Allowed: JPG, PNG (Max: 2MB)</small>
                                </div>

                            </div>

                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                💾 Save Settings
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
