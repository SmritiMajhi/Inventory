<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Cashier Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { background-color: #f8f9fa; overflow-x: hidden; }
    #sidebar { width: 250px; height: 100vh; position: fixed; left: 0; top: 0; background: #343a40; color: #fff; transition: all 0.3s; }
    #sidebar.collapsed { width: 70px; }
    #sidebar .nav-link { color: #adb5bd; padding: 12px 20px; display: flex; align-items: center; gap: 10px; transition: 0.3s; }
    #sidebar .nav-link:hover, #sidebar .nav-link.active { background-color: #495057; color: #fff; }
    #sidebar.collapsed .nav-link span { display: none; }
    #topbar { height: 60px; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: space-between; padding: 0 20px; margin-left: 250px; transition: margin-left 0.3s; }
    #sidebar.collapsed + #topbar { margin-left: 70px; }
    .content { margin-left: 250px; margin-top: 70px; transition: margin-left 0.3s; }
    #sidebar.collapsed ~ .content { margin-left: 70px; }
    .toggle-btn { border: none; background: none; font-size: 22px; color: #fff; }
    /* --- Sidebar Brand (POS System) --- */
#sidebar .brand-section {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition: all 0.3s ease;
}

#sidebar .brand-section i {
  font-size: 1.8rem;
  transition: all 0.3s ease;
}

#sidebar .brand-section span {
  font-size: 1.2rem;
  transition: all 0.3s ease;
}

/* When collapsed */
#sidebar.collapsed .brand-section i {
  font-size: 1.3rem;
}

#sidebar.collapsed .brand-section span {
  display: none;
}

  </style>
</head>

<body>
  {{-- Include Sidebar --}}
  @include('staff.partials.sidebar')

  {{-- Include Topbar --}}
  @include('staff.partials.topbar')

  {{-- Main Content --}}
  <div class="content p-4">
    @yield('content')
  </div>

  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
      });
    }
  </script>

  <!-- Bootstrap JS (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
