{{-- @extends('layouts.admin') 

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">
       
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text fs-3">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>

        
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sales</h5>
                    <p class="card-text fs-3">{{ $totalSales }}</p>
                </div>
            </div>
        </div>

       
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <p class="card-text fs-3">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>

       
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Suppliers</h5>
                    <p class="card-text fs-3">{{ $totalSuppliers }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="py-4 mb-4 bg-light rounded shadow-sm">
        <h1 class="display-5">Welcome, {{ Auth::user()->name ?? 'Admin' }}!</h1>
        <p class="lead text-muted">Here's an overview of your POS system performance.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-uppercase text-muted">Products</h6>
                    <h2 class="my-2">{{ $totalProducts }}</h2>
                    <div class="progress" style="height: 5px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div>
                    <small class="text-muted">Stock status</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-uppercase text-muted">Sales</h6>
                    <h2 class="my-2">{{ $totalSales }}</h2>
                    <div class="progress" style="height: 5px;">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                    </div>
                    <small class="text-muted">Monthly performance</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-uppercase text-muted">Customers</h6>
                    <h2 class="my-2">{{ $totalCustomers }}</h2>
                    <div class="progress" style="height: 5px;">
                        <div class="progress-bar bg-warning" style="width: 80%"></div>
                    </div>
                    <small class="text-muted">Engagement rate</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="text-uppercase text-muted">Suppliers</h6>
                    <h2 class="my-2">{{ $totalSuppliers }}</h2>
                    <div class="progress" style="height: 5px;">
                        <div class="progress-bar bg-danger" style="width: 50%"></div>
                    </div>
                    <small class="text-muted">Supply chain</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Performance -->
    <div class="row g-4">
        <!-- Sales Bar Chart -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h6 class="mb-0">Sales Overview (Last 12 months)</h6>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- Work Performance -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h6 class="mb-0">Work Completed</h6>
                </div>
                <div class="card-body">
                    <p>Orders Processed</p>
                    <div class="progress mb-3" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%">70%</div>
                    </div>
                    <p>Stock Updates</p>
                    <div class="progress mb-3" style="height: 20px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%">50%</div>
                    </div>
                    <p>Customer Engagement</p>
                    <div class="progress mb-3" style="height: 20px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%">80%</div>
                    </div>
                </div>
            </div>

            <!-- Performance Summary -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h6 class="mb-0">Performance Summary</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Monthly Sales</span>
                            <strong>$12,500</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>New Customers</span>
                            <strong>35</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Pending Orders</span>
                            <strong>8</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


            @section('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Sales Bar Chart ---
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Sales Amount ($)',
                data: [1200, 1500, 1100, 1800, 1700, 1900, 2000, 2200, 2100, 2500, 2400, 2300], // replace with dynamic values later
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // --- Optional: Animate progress bars dynamically ---
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const width = bar.style.width; // e.g. "70%"
        bar.style.width = '0';
        setTimeout(() => { bar.style.width = width; }, 200);
    });
});
</script>
@endsection

