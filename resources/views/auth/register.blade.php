{{-- @extends('layouts.app')

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
@endsection --}}


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Registration - POS System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body {
          background: linear-gradient(135deg, #4e54c8, #8f94fb);
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          font-family: 'Poppins', sans-serif;
      }
      .card {
          background: rgba(255,255,255,0.1);
          backdrop-filter: blur(10px);
          padding: 30px;
          border-radius: 12px;
          width: 100%;
          max-width: 400px;
          color: #fff;
          box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      }
      .form-label {
          color: #fff;
      }
      .btn-success {
          background-color: #28a745;
          border: none;
      }
      .alert-danger {
          background-color: rgba(255, 0, 0, 0.3);
          color: #fff;
          border: none;
      }
      h3 {
          font-weight: 600;
      }
  </style>
</head>
<body>

<div class="card">
    <h3 class="text-center mb-4">Staff Registration</h3>

    <!-- Error message -->
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Register</button>
    </form>

    <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</div>

</body>
</html>
