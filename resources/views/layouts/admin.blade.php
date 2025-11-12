<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      overflow-x: hidden;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #212529;
      color: white;
      padding-top: 1rem;
      transition: all 0.3s;
    }

    .sidebar.collapsed {
      width: 70px;
    }

    .sidebar h4, .sidebar .nav-link span {
      transition: all 0.3s;
    }

    .sidebar.collapsed h4, .sidebar.collapsed .nav-link span {
      display: none;
    }

    .sidebar .nav-link {
      color: #adb5bd;
      border-radius: 8px;
      margin: 4px 10px;
      padding: 10px;
      transition: 0.3s;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #0d6efd;
      color: white;
    }

    .content {
      margin-left: 250px;
      transition: all 0.3s;
      padding: 20px;
    }

    .content.collapsed {
      margin-left: 70px;
    }

    .topbar {
      background-color: #fff;
      border-bottom: 1px solid #dee2e6;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar d-flex flex-column flex-shrink-0 p-3" id="sidebar">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0">🧾 POS Admin</h4>
        <button class="btn btn-sm btn-outline-light" id="toggleSidebar">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <!-- Sidebar Menu -->
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="bi bi-speedometer2 me-2"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
          <i class="bi bi-tags me-2"></i> <span>Categories</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.suppliers.index') }}" class="nav-link {{ request()->routeIs('admin.suppliers.*') ? 'active' : '' }}">
          <i class="bi bi-truck me-2"></i> <span>Suppliers</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
          <i class="bi bi-box-seam me-2"></i> <span>Products</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
          <i class="bi bi-people me-2"></i> <span>Customers</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.purchases.index') }}" class="nav-link {{ request()->routeIs('admin.purchases.*') ? 'active' : '' }}">
          <i class="bi bi-cart-check me-2"></i> <span>Purchases</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.sales.index') }}" class="nav-link {{ request()->routeIs('admin.sales.*') ? 'active' : '' }}">
          <i class="bi bi-receipt-cutoff me-2"></i> <span>Sales</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.sale-items.index') }}" class="nav-link {{ request()->routeIs('admin.saleitems.*') ? 'active' : '' }}">
          <i class="bi bi-basket me-2"></i> <span>Sale Items</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.stocks.index') }}" class="nav-link {{ request()->routeIs('admin.stocks.*') ? 'active' : '' }}">
          <i class="bi bi-box2-heart me-2"></i> <span>Stocks</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
          <i class="bi bi-gear me-2"></i> <span>Settings</span>
        </a>
      </li>
    </ul>

    <hr>

    {{-- <a href="{{ route('logout') }}" class="btn btn-danger w-100">
      <i class="bi bi-box-arrow-right me-1"></i> Logout
    </a> --}}

   <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger w-100">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
    </button>
</form>




  </div>

  <!-- Main Content -->
  <div class="content" id="mainContent">
    <div class="topbar">
      <div>
        <span class="text-muted me-2">👤 {{ Auth::user()->name ?? 'Admin' }}</span>
      </div>
    </div>

    <div class="mt-4">
      @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('mainContent');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('collapsed');
    });
  </script>

@yield('scripts')


</body>
</html>
