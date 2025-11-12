@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>Edit Sale #{{ $sale->id }}</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.sales.update', $sale->id) }}" method="POST" id="saleForm">
        @csrf
        @method('PUT')

        <!-- Customer -->
        <div class="mb-3">
            <label for="customer">Customer</label>
            <select name="customer_id" id="customer" class="form-select" required>
                <option value="">-- Select Customer --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Sale Date -->
        <div class="mb-3">
            <label for="sale_date">Sale Date</label>
            <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ $sale->sale_date->format('Y-m-d') }}" required>
        </div>

        <hr>

        <!-- Products Table -->
        <h5>Products</h5>
        <table class="table table-bordered" id="productsTable">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>
                        <button type="button" class="btn btn-sm btn-success" id="addRow"><i class="bi bi-plus-circle"></i></button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $index => $item)
                <tr>
                    <td>
                        <select name="products[{{ $index }}][product_id]" class="form-select product-select" required>
                            <option value="">-- Select Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}"
                                    data-price="{{ $product->sell_price }}"
                                    data-stock="{{ $product->quantity }}"
                                    {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="products[{{ $index }}][price]" class="form-control price" value="{{ $item->price }}" readonly></td>
                    <td><input type="number" name="products[{{ $index }}][quantity]" class="form-control qty" min="1" value="{{ $item->quantity }}" required></td>
                    <td><input type="number" name="products[{{ $index }}][subtotal]" class="form-control subtotal" value="{{ $item->subtotal }}" readonly></td>
                    <td><button type="button" class="btn btn-sm btn-danger removeRow"><i class="bi bi-trash"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Amount -->
        <div class="mb-3">
            <label for="total">Total Amount</label>
            <input type="number" name="total_amount" id="total" class="form-control" value="{{ $sale->total_amount }}" readonly>
        </div>

        <button class="btn btn-success">Update Sale</button>
        <a href="{{ route('admin.sales.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
let rowIndex = {{ $sale->items->count() - 1 }};

// Function to update subtotal and total
function updateTotals() {
    let total = 0;
    $('#productsTable tbody tr').each(function(){
        const price = parseFloat($(this).find('.price').val()) || 0;
        const qty = parseFloat($(this).find('.qty').val()) || 0;
        const subtotal = price * qty;
        $(this).find('.subtotal').val(subtotal.toFixed(2));
        total += subtotal;
    });
    $('#total').val(total.toFixed(2));
}

$(document).ready(function(){

    // 1️⃣ Initialize prices from selected products on page load
    $('#productsTable tbody tr').each(function(){
        const select = $(this).find('.product-select');
        const priceInput = $(this).find('.price');
        const price = select.find(':selected').data('price') || 0;
        priceInput.val(price);
    });
    updateTotals();

    // 2️⃣ Update price when product changes
    $(document).on('change', '.product-select', function(){
        const price = $(this).find(':selected').data('price') || 0;
        $(this).closest('tr').find('.price').val(price);
        updateTotals();
    });

    // 3️⃣ Update subtotal & total when quantity changes
    $(document).on('input', '.qty', function(){
        updateTotals();
    });

    // 4️⃣ Add new product row
    $('#addRow').click(function(){
        rowIndex++;
        let newRow = `<tr>
            <td>
                <select name="products[${rowIndex}][product_id]" class="form-select product-select" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->sell_price }}" data-stock="{{ $product->quantity }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="products[${rowIndex}][price]" class="form-control price" readonly></td>
            <td><input type="number" name="products[${rowIndex}][quantity]" class="form-control qty" min="1" value="1" required></td>
            <td><input type="number" name="products[${rowIndex}][subtotal]" class="form-control subtotal" readonly></td>
            <td><button type="button" class="btn btn-sm btn-danger removeRow"><i class="bi bi-trash"></i></button></td>
        </tr>`;
        $('#productsTable tbody').append(newRow);
    });

    // 5️⃣ Remove a product row
    $(document).on('click', '.removeRow', function(){
        $(this).closest('tr').remove();
        updateTotals();
    });
});
</script>
@endsection
