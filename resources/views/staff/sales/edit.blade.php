@extends('staff.layouts.app')
@section('title', 'Edit Sale')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Edit Sale #{{ $sale->id }}</h3>
        <form action="{{ route('staff.sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer</label>
                <select name="customer_id" id="customer_id" class="form-select" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="number" step="0.01" name="total_amount" value="{{ $sale->total_amount }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" name="sale_date" value="{{ $sale->sale_date->format('Y-m-d') }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Update Sale</button>
            <a href="{{ route('staff.sales.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
