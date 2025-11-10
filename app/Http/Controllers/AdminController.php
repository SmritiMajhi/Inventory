<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Supplier;

class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalSales = Sale::count();
        $totalCustomers = Customer::count();
        $totalSuppliers = Supplier::count();

        return view('admin.dashboard', compact('totalProducts', 'totalSales', 'totalCustomers', 'totalSuppliers'));
    }
}


