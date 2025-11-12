
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <!-- Left side: Logo -->
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">
      <i class="fa-solid fa-cash-register me-2"></i> POS System
    </a>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('suppliers.index') }}">Suppliers</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Customers</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
      </ul>

      <!-- Right side: Login & Register -->
      <div class="d-flex align-items-center">
        <!-- Login Dropdown -->
        <div class="btn-group">
          <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('login') }}?role=admin">Admin</a></li>
            <li><a class="dropdown-item" href="{{ route('login') }}?role=cashier">Cashier</a></li>
          </ul>
        </div>

        <!-- Register Button -->
        <a href="{{ route('register') }}" class="btn btn-success btn-sm ms-2">Register</a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  @yield('content')
</div>





