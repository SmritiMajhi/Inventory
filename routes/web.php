<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Staff\SalesController;
use App\Http\Controllers\Staff\CustomersController;
use App\Http\Controllers\Staff\ProductsController;
use App\Http\Controllers\Staff\SalesItemController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\SettingController as StaffSettingController;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\SaleItemController;
use App\Http\Controllers\SettingController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Welcome
Route::get('/', [AuthController::class, 'welcome'])->name('welcome');

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Logout (POST for security)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------- Admin Routes -------------------
// Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')
    ->middleware('auth') // optionally add role check
    ->name('admin.')      // THIS is what prefixes route names with admin.
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Invoice view for a sale
Route::get('/sales/{sale}/invoice', [SaleController::class, 'invoice'])->name('sales.invoice');


Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);    
Route::resource('products', ProductController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('sales', SaleController::class);
Route::resource('sale-items', SaleItemController::class);
    Route::resource('stocks', StockController::class);

Route::resource('settings', SettingController::class);
});

// Staff routes (session-based login)
Route::prefix('staff')->name('staff.')->group(function () {

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');


    // Staff settings (use the Staff controller alias)
    Route::get('settings/edit', [StaffSettingController::class, 'edit'])->name('settings.edit');
    // Accept both PUT and POST for compatibility with different form submit setups
    Route::match(['PUT', 'POST'], 'settings/update', [StaffSettingController::class, 'update'])->name('settings.update');

    // Products, Sales, Customers, etc.
    Route::resource('products', ProductsController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('sales', SalesController::class);
    Route::resource('salesitems', SalesItemController::class);
    Route::post('logout', [StaffController::class, 'logout'])->name('logout');
    
});
