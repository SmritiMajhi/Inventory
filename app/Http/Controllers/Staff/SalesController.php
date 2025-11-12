<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Customer;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer')->latest()->get();
        return view('staff.sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('staff.sales.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric|min:0',
            'sale_date' => 'required|date',
        ]);

        Sale::create($request->all());

        return redirect()->route('staff.sales.index')->with('success', 'Sale created successfully.');
    }

    public function show(Sale $sale)
    {
        return view('staff.sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $customers = Customer::all();
        return view('staff.sales.edit', compact('sale', 'customers'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric|min:0',
            'sale_date' => 'required|date',
        ]);

        $sale->update($request->all());

        return redirect()->route('staff.sales.index')->with('success', 'Sale updated successfully.');
    }

   public function destroy($id)
{
    $sale = Sale::findOrFail($id);
    $sale->delete();

    return redirect()->route('staff.sales.index')->with('success', 'Sale deleted successfully!');
}

// Generate invoice for a sale
public function invoice(Sale $sale)
{
    // Load sale with customer and products
    $sale->load('customer', 'items.product');

    // Return invoice view
    return view('staff.sales.invoice', compact('sale'));
}

}
