@extends('staff.layouts.app')
@section('title', 'Invoice Category Details')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm rounded-4 p-4">
        <h3 class="mb-4">Invoice Category Details</h3>
        <p><strong>ID:</strong> {{ $invoicescategory->id }}</p>
        <p><strong>Name:</strong> {{ $invoicescategory->name }}</p>
        <p><strong>Created At:</strong> {{ $invoicescategory->created_at->format('d M Y') }}</p>
        <p><strong>Updated At:</strong> {{ $invoicescategory->updated_at->format('d M Y') }}</p>
        <a href="{{ route('staff.invoicescategory.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</div>
@endsection
