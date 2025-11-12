<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\Product;

class SalesItemController extends Controller
{
    public function index()
    {
        $items = SaleItem::with('sale', 'product')->latest()->get();
        return view('staff.salesitems.index', compact('items'));
    }

    public function create()
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('staff.salesitems.create', compact('sales', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $request['subtotal'] = $request->quantity * $request->price;

        SaleItem::create($request->all());

        return redirect()->route('staff.salesitems.index')->with('success', 'Sale item added.');
    }

    public function show(SaleItem $salesitem)
    {
        return view('staff.salesitems.show', compact('salesitem'));
    }

    public function edit(SaleItem $salesitem)
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('staff.salesitems.edit', compact('salesitem', 'sales', 'products'));
    }

    public function update(Request $request, SaleItem $salesitem)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $request['subtotal'] = $request->quantity * $request->price;

        $salesitem->update($request->all());

        return redirect()->route('staff.salesitems.index')->with('success', 'Sale item updated.');
    }

    public function destroy(SaleItem $salesitem)
    {
        $salesitem->delete();
        return redirect()->route('staff.salesitems.index')->with('success', 'Sale item deleted.');
    }
}
