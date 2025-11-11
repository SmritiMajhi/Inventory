<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::with(['category', 'supplier'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Show form to create product
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.products.create', compact('categories', 'suppliers'));
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:0',
            'buy_price' => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    // Show edit form
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.products.edit', compact('product', 'categories', 'suppliers'));
    }

    // Show a single product
public function show(Product $product)
{
    // Load category and supplier relationship
    $product->load(['category', 'supplier']);
    
    return view('admin.products.show', compact('product'));
}


    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:0',
            'buy_price' => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
