{{-- @extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Add Purchase</h3>
    <form action="{{ route('admin.purchases.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id">Product</label>
            <select name="product_id" class="form-control" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" min="0" required>
        </div>
        <div class="mb-3">
            <label for="purchase_date">Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>
        <button class="btn btn-success"><i class="bi bi-check-circle me-1"></i> Create</button>
        <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Cancel</a>
    </form>
</div>
@endsection --}}


@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Add Purchase</h3>
    <form action="{{ route('admin.purchases.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}" data-price="{{ $product->buy_price }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="price">Total Price</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" readonly>
        </div>

        <div class="mb-3">
            <label for="purchase_date">Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>

        <button class="btn btn-success"><i class="bi bi-check-circle me-1"></i> Create</button>
        <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Cancel</a>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('quantity');
    const priceInput = document.getElementById('price');

    function updatePrice() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const buyPrice = parseFloat(selectedOption.dataset.price) || 0;
        const quantity = parseInt(quantityInput.value) || 0;
        priceInput.value = (buyPrice * quantity).toFixed(2);
    }

    productSelect.addEventListener('change', updatePrice);
    quantityInput.addEventListener('input', updatePrice);
});
</script>
@endsection
