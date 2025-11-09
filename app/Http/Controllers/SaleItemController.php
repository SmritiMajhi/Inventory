<?php

namespace App\Http\Controllers;

use App\Models\SaleItem;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    public function index()
    {
        $saleItems = SaleItem::with('sale', 'product')->get();
        return view('sale-items.index', compact('saleItems'));
    }

    public function create()
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('sale-items.create', compact('sales', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        SaleItem::create($request->all());
        return redirect()->route('sale-items.index')->with('success', 'Sale item added successfully!');
    }

    public function destroy(SaleItem $saleItem)
    {
        $saleItem->delete();
        return redirect()->route('sale-items.index')->with('success', 'Sale item deleted successfully!');
    }
}
