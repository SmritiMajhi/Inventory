<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaleItem;

class SaleItemController extends Controller
{
    // List all sale items (read-only)
    public function index()
    {
        $saleItems = SaleItem::with('sale.customer', 'product')->latest()->paginate(10);
        return view('admin.sale-items.index', compact('saleItems'));
    }

    // Show a single sale item
    public function show(SaleItem $saleItem)
    {
        $saleItem->load('sale.customer', 'product');
        return view('admin.sale-items.show', compact('saleItem'));
    }

    // Prevent direct creation
    public function create()
    {
        abort(403, 'Direct creation of sale items is not allowed. Create through Sales.');
    }

    // Prevent direct editing
    public function edit(SaleItem $saleItem)
    {
        abort(403, 'Direct editing of sale items is not allowed. Edit through Sales.');
    }

    // Prevent direct deletion
    public function destroy(SaleItem $saleItem)
    {
        abort(403, 'Direct deletion of sale items is not allowed. Manage through Sales.');
    }
}
