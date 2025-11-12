<div id="sidebar">
  <div class="text-center py-3 border-bottom brand-section">
    <button class="toggle-btn" id="toggleSidebar">
      <i class="bi bi-list"></i>
    </button>
    <i class="bi bi-shop fs-3 me-2"></i>
    <span class="fs-5 fw-semibold">POS System</span>
  </div>

  <nav class="nav flex-column mt-3">
    <a href="{{route('staff.dashboard')}}" class="nav-link"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
    <a href="{{route('staff.sales.index')}}" class="nav-link"><i class="bi bi-cart4"></i> <span>Sales</span></a>
    <a href="{{route('staff.products.index')}}" class="nav-link"><i class="bi bi-box-seam"></i> <span>Products</span></a>
    <a href="{{ route('staff.salesitems.index') }}" class="nav-link"><i class="bi bi-receipt"></i><span>Sales Items</span></a>
    <a href="{{route('staff.customers.index')}}" class="nav-link"><i class="bi bi-people"></i> <span>Customers</span></a>
    <a href="{{route('staff.settings.index')}}" class="nav-link"><i class="bi bi-gear"></i> <span>Settings</span></a>
    <a href="{{ route('logout') }}" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
  </nav>
</div>
