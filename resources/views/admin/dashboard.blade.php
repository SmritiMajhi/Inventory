@extends('layouts.admin') <!-- assuming you have a main layout -->

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">
        <!-- Total Products -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text fs-3">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>

        <!-- Total Sales -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sales</h5>
                    <p class="card-text fs-3">{{ $totalSales }}</p>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <p class="card-text fs-3">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>

        <!-- Total Suppliers -->
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
@endsection
