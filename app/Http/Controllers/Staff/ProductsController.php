<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('staff.products.index', compact('products'));
    }

    public function create()
{
    $categories = Category::all();  // Admin categories
    $suppliers = Supplier::all();   // Admin suppliers
    return view('staff.products.create', compact('categories', 'suppliers'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('staff.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('staff.products.show', compact('product'));
    }

    public function edit(Product $product)
{
    $categories = Category::all();
    $suppliers = Supplier::all();
    return view('staff.products.edit', compact('product', 'categories', 'suppliers'));
}

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('staff.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('staff.products.index')->with('success', 'Product deleted successfully.');
    }
}
