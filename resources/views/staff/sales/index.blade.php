@extends('staff.layouts.app')
@section('title', 'Sales List')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sales List</h2>
        <a href="{{ route('staff.sales.create') }}" class="btn btn-primary">Add New Sale</a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                    <th>Sale Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->customer->name ?? 'N/A' }}</td>
                    <td>Rs. {{ number_format($sale->total_amount, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('staff.sales.show', $sale->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('staff.sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $sale->id }}">
                            Delete
                        </button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $sale->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $sale->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $sale->id }}">Delete Sale #{{ $sale->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete this sale?
                              </div>
                              <div class="modal-footer">
                                <form action="{{ route('staff.sales.destroy', $sale->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($sales->isEmpty())
            <p class="text-center my-3">No sales found.</p>
        @endif
    </div>
</div>
@endsection
