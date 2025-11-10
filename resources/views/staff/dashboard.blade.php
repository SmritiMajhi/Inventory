<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cashier Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      overflow-x: hidden;
    }

    /* Sidebar styling */
    #sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: #343a40;
      color: #fff;
      transition: all 0.3s;
    }

    #sidebar.collapsed {
      width: 70px;
    }

    #sidebar .nav-link {
      color: #adb5bd;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: 0.3s;
    }

    #sidebar .nav-link:hover,
    #sidebar .nav-link.active {
      background-color: #495057;
      color: #fff;
    }

    #sidebar.collapsed .nav-link span {
      display: none;
    }

    /* Topbar */
    #topbar {
      height: 60px;
      background: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      margin-left: 250px;
      transition: margin-left 0.3s;
    }

    #sidebar.collapsed + #topbar {
      margin-left: 70px;
    }

    .content {
      margin-left: 250px;
      margin-top: 70px;
      transition: margin-left 0.3s;
    }

    #sidebar.collapsed ~ .content {
      margin-left: 70px;
    }

    .toggle-btn {
      border: none;
      background: none;
      font-size: 22px;
      color: #fff;
     
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div id="sidebar">

      
    <div class="text-center py-3 border-bottom">
<button class="toggle-btn" id="toggleSidebar">
      <i class="bi bi-list"></i>
    </button>
      

      <i class="bi bi-shop fs-3 me-2"></i>
      <span class="fs-5 fw-semibold">POS System</span>
    </div>
    <nav class="nav flex-column mt-3">
      <a href="#" class="nav-link active"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
      <a href="#" class="nav-link"><i class="bi bi-cart4"></i> <span>Sales</span></a>
      <a href="#" class="nav-link"><i class="bi bi-box-seam"></i> <span>Products</span></a>
      <a href="#" class="nav-link"><i class="bi bi-receipt-cutoff"></i> <span>Invoices</span></a>
      <a href="#" class="nav-link"><i class="bi bi-people"></i> <span>Customers</span></a>
      <a href="#" class="nav-link"><i class="bi bi-gear"></i> <span>Settings</span></a>
      <a href="{{ route('logout') }}" class="nav-link text-danger"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
    </nav>
  </div>

  <!-- Topbar -->
  <div id="topbar">
    
    <h5 class="mb-0 fw-semibold">Cashier Dashboard</h5>
    <div>
      <i class="bi bi-person-circle fs-4"></i>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content p-4">
    <div class="container-fluid">
      <div class="row g-3">
        <div class="col-md-3">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <i class="bi bi-cart4 fs-1 text-primary"></i>
              <h5 class="mt-2">Today's Sales</h5>
              <p class="text-muted">Rs. 10,000</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <i class="bi bi-box-seam fs-1 text-success"></i>
              <h5 class="mt-2">Products</h5>
              <p class="text-muted">150 Items</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <i class="bi bi-receipt-cutoff fs-1 text-warning"></i>
              <h5 class="mt-2">Invoices</h5>
              <p class="text-muted">25 Issued</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <i class="bi bi-people fs-1 text-info"></i>
              <h5 class="mt-2">Customers</h5>
              <p class="text-muted">80 Registered</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
    });
  </script>
</body>
</html>
