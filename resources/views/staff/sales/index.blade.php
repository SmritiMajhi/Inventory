@extends('staff.layouts.app')
@section('title', 'Sales List')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sales List</h2>
        <a href="{{ route('staff.sales.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Sale
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded-4">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                    <th>Sale Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->customer->name ?? 'N/A' }}</td>
                    <td>Rs. {{ number_format($sale->total_amount, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') }}</td>
                    <td class="text-center">
                        <!-- View -->
                        <a href="{{ route('staff.sales.show', $sale->id) }}" class="btn btn-info btn-sm me-1" title="View">
                            <i class="bi bi-eye"></i>
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('staff.sales.edit', $sale->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <!-- Invoice -->
                        <a href="{{ route('staff.sales.invoice', $sale->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-receipt"></i></a>

                        <!-- Delete -->
                        <button type="button" class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $sale->id }}">
                            <i class="bi bi-trash"></i>
                        </button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $sale->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $sale->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="deleteModalLabel{{ $sale->id }}">Delete Sale #{{ $sale->id }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                <p class="fs-5">Are you sure you want to delete this sale?</p>
                              </div>
                              <div class="modal-footer justify-content-center">
                                <form action="{{ route('staff.sales.destroy', $sale->id) }}" method="POST" class="d-inline">
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
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No sales found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
