@extends('layouts.app')

@section('content')
<div class="container mt-5 col-md-5">
    <div class="card p-4 shadow">
        <h3 class="text-center mb-3">Register as Cashier</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <input type="hidden" name="role" value="cashier"> <!-- force cashier -->

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

        <p class="mt-3 text-center">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </p>
    </div>
</div>
@endsection
