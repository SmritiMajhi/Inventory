<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    // 📄 Display all sales
    public function index()
    {
        $sales = Sale::with('customer')->latest()->paginate(10);
        return view('admin.sales.index', compact('sales'));
    }

    // ➕ Show create form
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.sales.create', compact('customers', 'products'));
    }

    // 💾 Store new sale with items
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'sale_date' => 'required|date',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            // Step 1: Create Sale
            $sale = Sale::create([
                'customer_id' => $request->customer_id,
                'sale_date' => $request->sale_date,
                'total_amount' => 0, // temporary
            ]);

            $total = 0;

            // Step 2: Loop through each product
            foreach ($request->products as $item) {
                $product = Product::findOrFail($item['product_id']);
                $price = $product->sell_price;
                $quantity = $item['quantity'];
                $subtotal = $price * $quantity;

                // Create sale item
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
                ]);

                // Update product stock
                $product->quantity -= $quantity;
                $product->save();

                $total += $subtotal;
            }

            // Step 3: Update total
            $sale->update(['total_amount' => $total]);
        });

        return redirect()->route('admin.sales.index')->with('success', 'Sale recorded successfully!');
    }


    // Show edit form
public function edit(Sale $sale)
{
    $customers = Customer::all();
    $products = Product::all();
    $sale->load('items'); // Make sure 'items' relationship is defined in Sale model
    return view('admin.sales.edit', compact('sale', 'customers', 'products'));
}

// Update sale
public function update(Request $request, Sale $sale)
{
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'sale_date' => 'required|date',
        'products.*.product_id' => 'required|exists:products,id',
        'products.*.quantity' => 'required|integer|min:1',
    ]);

    // Update sale data
    $sale->update([
        'customer_id' => $request->customer_id,
        'sale_date' => $request->sale_date,
        'total_amount' => collect($request->products)->sum(function($item) {
            $product = Product::find($item['product_id']);
            return $product->sell_price * $item['quantity'];
        }),
    ]);

    // Delete old items
    $sale->items()->delete();

    // Insert new items
    foreach($request->products as $item){
        $sale->items()->create([
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => Product::find($item['product_id'])->sell_price,
            'subtotal' => Product::find($item['product_id'])->sell_price * $item['quantity'],
        ]);
    }

    return redirect()->route('admin.sales.index')->with('success', 'Sale updated successfully!');
}


    // 👁 Show sale details
    public function show(Sale $sale)
    {
        $sale->load('customer', 'items.product');
        return view('admin.sales.show', compact('sale'));
    }

    // ❌ Delete sale
    public function destroy(Sale $sale)
    {
        DB::transaction(function () use ($sale) {
            // Restore product stock
            foreach ($sale->items as $item) {
                $product = $item->product;
                $product->quantity += $item->quantity;
                $product->save();
            }

            // Delete sale and items
            $sale->items()->delete();
            $sale->delete();
        });

        return redirect()->route('admin.sales.index')->with('success', 'Sale deleted successfully!');
    }


    // Generate invoice for a sale
public function invoice(Sale $sale)
{
    // Load sale with customer and products
    $sale->load('customer', 'items.product');

    // Return invoice view
    return view('admin.sales.invoice', compact('sale'));
}

}

