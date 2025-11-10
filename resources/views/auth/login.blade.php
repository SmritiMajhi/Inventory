{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5 col-md-4">
    <div class="card p-4 shadow">
        <h3 class="text-center mb-3">Login</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option value="admin" {{ request('role')=='admin' ? 'selected' : '' }}>Admin</option>
                    <option value="cashier" {{ request('role')=='cashier' ? 'selected' : '' }}>Cashier</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <p class="mt-3 text-center">
            Don't have an account? <a href="{{ route('register') }}">Register as Cashier</a>
        </p>
    </div>
</div>
@endsection --}}



@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-4">Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role">Login As</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection

