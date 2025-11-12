<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Show all stocks
    public function index()
    {
        $stocks = Stock::with('product')->paginate(10);
        return view('admin.stocks.index', compact('stocks'));
    }

    // Show form to create stock
    public function create()
    {
        $products = Product::all();
        return view('admin.stocks.create', compact('products'));
    }

    // Store new stock
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'available_quantity' => 'required|integer|min:1',
        ]);

        Stock::create($request->all());
        return redirect()->route('admin.stocks.index')->with('success', 'Stock added successfully.');
    }

    // Show specific stock
    public function show(Stock $stock)
    {
        return view('admin.stocks.show', compact('stock'));
    }

    // Edit stock
    public function edit(Stock $stock)
    {
        $products = Product::all();
        return view('admin.stocks.edit', compact('stock', 'products'));
    }

    // Update stock
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'available_quantity' => 'required|integer|min:1',
        ]);

        $stock->update($request->all());
        return redirect()->route('admin.stocks.index')->with('success', 'Stock updated successfully.');
    }

    // Delete stock
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('admin.stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
