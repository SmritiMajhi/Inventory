
<nav class="navbar navbar-expand-lg mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Inventory System</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('suppliers.index') }}">Suppliers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Customers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>


