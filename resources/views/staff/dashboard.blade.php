@extends('staff.layouts.app')

@section('title', 'Cashier Dashboard')

@section('content')
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
@endsection
