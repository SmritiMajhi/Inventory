@extends('staff.layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<div class="container-fluid">

    @php
        // Dynamic progress (edit target values as needed)
        $salesTarget = 10000;
        $invoiceTarget = 100;
        $customerTarget = 1000;
        $productTarget = 500;

        $salesProgress = isset($todaySales) ? min(100, ($todaySales / $salesTarget) * 100) : 0;
        $invoiceProgress = isset($todayInvoices) ? min(100, ($todayInvoices / $invoiceTarget) * 100) : 0;
        $customerProgress = isset($totalCustomers) ? min(100, ($totalCustomers / $customerTarget) * 100) : 0;
        $productProgress = isset($totalProducts) ? min(100, ($totalProducts / $productTarget) * 100) : 0;
    @endphp

    <!-- Welcome Section -->
    <div class="p-4 mb-4 bg-light rounded shadow-sm">
        <h1 class="display-6">Welcome, {{ Auth::user()->name ?? 'Staff' }} 👋</h1>
        <p class="lead text-muted">Here is an overview of your performance today.</p>
    </div>

    <!-- Dashboard Cards Row -->
    <div class="row g-4 mb-4">

        <!-- Today's Sales -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="bi bi-cash-coin fs-1 text-primary"></i>
                    <h6 class="text-uppercase text-muted mt-2">Today's Sales</h6>
                    <h2 class="fw-bold">Rs. {{ $todaySales ?? 0 }}</h2>

                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-primary" style="width: {{ $salesProgress }}%"></div>
                    </div>
                    <small class="text-muted">Progress: {{ number_format($salesProgress, 0) }}%</small>
                </div>
            </div>
        </div>

        <!-- Products -->
<div class="col-md-3">
    <div class="card shadow-sm border-0 text-center">
        <div class="card-body">
            <i class="bi bi-box-seam fs-1 text-success"></i>
            <h6 class="text-uppercase text-muted mt-2">Products</h6>
            <h2 class="fw-bold">{{ $totalProducts ?? 0 }}</h2>

            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: {{ $productProgress }}%"></div>
            </div>
            <small class="text-muted">Stock Overview</small>
        </div>
    </div>
</div>

        <!-- Invoices -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="bi bi-receipt fs-1 text-warning"></i>
                    <h6 class="text-uppercase text-muted mt-2">Today's Invoices</h6>
                    <h2 class="fw-bold">{{ $todayInvoices ?? 0 }}</h2>

                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-warning" style="width: {{ $invoiceProgress }}%"></div>
                    </div>
                    <small class="text-muted">Issued Today</small>
                </div>
            </div>
        </div>

        <!-- Customers -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <i class="bi bi-people fs-1 text-info"></i>
                    <h6 class="text-uppercase text-muted mt-2">Customers</h6>
                    <h2 class="fw-bold">{{ $totalCustomers ?? 0 }}</h2>

                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-info" style="width: {{ $customerProgress }}%"></div>
                    </div>
                    <small class="text-muted">Registered</small>
                </div>
            </div>
        </div>

    </div>

    <!-- Performance + Stats Section -->
    <div class="row g-4">

        <!-- Hourly Sales Chart -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">
                    Hourly Sales Overview
                </div>
                <div class="card-body">
                    <canvas id="hourlySalesChart" height="150"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">
                    Quick Stats
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Pending Bills</span>
                            <strong>{{ $pendingBills ?? 0 }}</strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Items Sold Today</span>
                            <strong>{{ $itemsSold ?? 0 }}</strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Cash Collection</span>
                            <strong>Rs. {{ $cashCollection ?? 0 }}</strong>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('hourlySalesChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['8 AM','9 AM','10 AM','11 AM','12 PM','1 PM','2 PM','3 PM','4 PM','5 PM'],
            datasets: [{
                label: 'Sales (Rs)',
                data: [300, 600, 900, 1200, 1500, 1700, 1400, 1600, 1800, 2000],
                borderWidth: 2,
                backgroundColor: 'rgba(0,123,255,0.2)',
                borderColor: '#007bff',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            plugins: { legend: { display: false }},
            responsive: true,
            scales: { y: { beginAtZero: true }}
        }
    });

});
</script>
@endsection
