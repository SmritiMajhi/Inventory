<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Only allow if logged in as staff
        if (!Session::has('user_id') || Session::get('user_role') !== 'staff') {
            return redirect()->route('login');
        }

        // Count total products
        $totalProducts = Product::count();

        // Progress bar percentage
        $maxProducts = 200; // example max stock
        $productProgress = $maxProducts > 0 ? ($totalProducts / $maxProducts) * 100 : 0;

        // Today's sales
        $todaySales = Sale::whereDate('created_at', now())->sum('total_amount');

        // Total customers
        $totalCustomers = Customer::count();

        // Today's invoices
        $todayInvoices = Sale::whereDate('created_at', now())->count();

        // Get hourly sales (8AM to 5PM)
        $today = Carbon::today();
        $hourlySales = Sale::whereDate('created_at', $today)
            ->selectRaw('HOUR(created_at) as hour, SUM(total_amount) as total')
            ->groupBy('hour')
            ->orderBy('hour')
            ->pluck('total', 'hour'); // returns [hour => total]

        $hours = range(8, 17); // 8AM to 5PM
        $hourlySalesData = [];
        foreach ($hours as $hour) {
            $hourlySalesData[] = $hourlySales[$hour] ?? 0;
        }

        // Pass all data to the dashboard view
        return view('staff.dashboard', [
            'totalProducts' => $totalProducts,
            'productProgress' => $productProgress,
            'todaySales' => $todaySales,
            'todayInvoices' => $todayInvoices,
            'totalCustomers' => $totalCustomers,
            'hourlySalesData' => $hourlySalesData
        ]);
    }
}
