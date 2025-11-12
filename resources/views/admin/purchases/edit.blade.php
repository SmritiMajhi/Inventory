{{-- @extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Purchase</h3>
    <form action="{{ route('admin.purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="product_id">Product</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $purchase->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $purchase->quantity }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $purchase->price }}" step="0.01" min="0" required>
        </div>
        <div class="mb-3">
            <label for="purchase_date">Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" value="{{ $purchase->purchase_date }}" required>
        </div>
        <button class="btn btn-success"><i class="bi bi-check-circle me-1"></i> Update</button>
        <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Cancel</a>
    </form>
</div>
@endsection --}}


@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Purchase</h3>
    <form action="{{ route('admin.purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}" 
                        data-price="{{ $product->buy_price }}" 
                        {{ $purchase->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="{{ $purchase->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="price">Total Price</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ $purchase->price }}" readonly>
        </div>

        <div class="mb-3">
            <label for="purchase_date">Purchase Date</label>
            {{-- <input type="date" name="purchase_date" class="form-control" value="{{ $purchase->purchase_date->format('Y-m-d') }}" required> --}}
            <input type="date" name="purchase_date" class="form-control" value="{{ date('Y-m-d', strtotime($purchase->purchase_date)) }}" required>

        </div>

        <button class="btn btn-success"><i class="bi bi-check-circle me-1"></i> Update</button>
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

    // Update price on page load in case quantity or product is pre-filled
    updatePrice();

    productSelect.addEventListener('change', updatePrice);
    quantityInput.addEventListener('input', updatePrice);
});
</script>
@endsection
