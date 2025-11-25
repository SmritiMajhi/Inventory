<div id="topbar">
  <a href="{{ route('welcome') }}" class="text-decoration-none"><h5 class="mb-0 fw-semibold text-dark">Cashier Dashboard</h5></a>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <a class="navbar-brand fs-5" href="#">
        {{ $setting->company_name ?? 'Company Name' }}
    </a>

    <div class="ms-auto dropdown">
        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            @php
                $hasPublic = false;
                try {
                    $hasPublic = \Illuminate\Support\Facades\Storage::disk('public')->exists($setting->logo);
                } catch (\Throwable $e) {
                    $hasPublic = false;
                }
            @endphp
            @if(!empty($setting->logo) && $hasPublic)
                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($setting->logo) }}" alt="Logo" class="rounded-circle" width="40" height="40">
            @elseif(!empty($setting->logo))
                {{-- Fallback to the asset helper which points to public/storage --}}
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="rounded-circle" width="40" height="40">
            @else
                <i class="bi bi-person-circle fs-4"></i>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="{{ route('staff.dashboard') }}">Home</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('staff.logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

</div>
