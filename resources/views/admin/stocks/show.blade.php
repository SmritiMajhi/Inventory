@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Stock Details</h3>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $stock->id }}</td>
        </tr>
        <tr>
            <th>Product</th>
            <td>{{ $stock->product->name }}</td>
        </tr>
        <tr>
            <th>Available Quantity</th>
            <td>{{ $stock->available_quantity }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $stock->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $stock->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.stocks.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
