<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvoiceCategory;

class InvoiceCategoryController extends Controller
{
    public function index()
    {
        $categories = InvoiceCategory::latest()->get();
        return view('staff.invoicescategory.index', compact('categories'));
    }

    public function create()
    {
        return view('staff.invoicescategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        InvoiceCategory::create($request->all());
        return redirect()->route('staff.invoicescategory.index')->with('success', 'Category created successfully.');
    }

    public function show(InvoiceCategory $invoicescategory)
    {
        return view('staff.invoicescategory.show', compact('invoicescategory'));
    }

    public function edit(InvoiceCategory $invoicescategory)
    {
        return view('staff.invoicescategory.edit', compact('invoicescategory'));
    }

    public function update(Request $request, InvoiceCategory $invoicescategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $invoicescategory->update($request->all());
        return redirect()->route('staff.invoicescategory.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(InvoiceCategory $invoicescategory)
    {
        $invoicescategory->delete();
        return redirect()->route('staff.invoicescategory.index')->with('success', 'Category deleted successfully.');
    }
}
