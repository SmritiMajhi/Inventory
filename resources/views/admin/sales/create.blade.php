@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3>New Sale</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.sales.store') }}" method="POST" id="saleForm">
        @csrf

        <div class="mb-3">
            <label for="customer">Customer</label>
            <select name="customer_id" id="customer" class="form-select" required>
                <option value="">-- Select Customer --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sale_date">Sale Date</label>
            <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <hr>
        <h5>Products</h5>
        <table class="table table-bordered" id="productsTable">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>
                        <button type="button" class="btn btn-sm btn-success" id="addRow">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="products[0][product_id]" class="form-select product-select" required>
                            <option value="">-- Select Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->sell_price }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="products[0][price]" class="form-control price" readonly></td>
                    <td><input type="number" name="products[0][quantity]" class="form-control qty" min="1" value="1" required></td>
                    <td><input type="number" name="products[0][subtotal]" class="form-control subtotal" readonly></td>
                    <td><button type="button" class="btn btn-sm btn-danger removeRow"><i class="bi bi-trash"></i></button></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="total">Total Amount</label>
            <input type="number" name="total_amount" id="total" class="form-control" readonly>
        </div>

        <button class="btn btn-success">Save Sale</button>
        <a href="{{ route('admin.sales.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let rowIndex = 0;

    function updateTotals() {
        let total = 0;
        document.querySelectorAll('#productsTable tbody tr').forEach(tr => {
            let price = parseFloat(tr.querySelector('.price').value) || 0;
            let qty = parseFloat(tr.querySelector('.qty').value) || 0;
            let subtotal = price * qty;
            tr.querySelector('.subtotal').value = subtotal.toFixed(2);
            total += subtotal;
        });
        document.getElementById('total').value = total.toFixed(2);
    }

    // When product changes
    document.addEventListener('change', function(e){
        if(e.target.classList.contains('product-select')){
            let price = parseFloat(e.target.selectedOptions[0].dataset.price) || 0;
            e.target.closest('tr').querySelector('.price').value = price;
            updateTotals();
        }
    });

    // When quantity changes
    document.addEventListener('input', function(e){
        if(e.target.classList.contains('qty')){
            updateTotals();
        }
    });

    // Add new row
    document.getElementById('addRow').addEventListener('click', function(){
        rowIndex++;
        let tbody = document.querySelector('#productsTable tbody');
        let newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select name="products[${rowIndex}][product_id]" class="form-select product-select" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->sell_price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="products[${rowIndex}][price]" class="form-control price" readonly></td>
            <td><input type="number" name="products[${rowIndex}][quantity]" class="form-control qty" min="1" value="1" required></td>
            <td><input type="number" name="products[${rowIndex}][subtotal]" class="form-control subtotal" readonly></td>
            <td><button type="button" class="btn btn-sm btn-danger removeRow"><i class="bi bi-trash"></i></button></td>
        `;
        tbody.appendChild(newRow);
    });

    // Remove row
    document.addEventListener('click', function(e){
        if(e.target.closest('.removeRow')){
            e.target.closest('tr').remove();
            updateTotals();
        }
    });
});
</script>
@endsection
