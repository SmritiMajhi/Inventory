<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;


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

// ------------------- Cashier Routes -------------------
// Route::prefix('staff')->middleware(['auth', 'role:staff'])->group(function () {
//     Route::get('dashboard', [StaffController::class, 'index'])->name('staff.dashboard');

// Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::middleware('auth')->group(function () {

    Route::get('/staff/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');



    // Optionally, cashier can have access to sales only:
    Route::resource('sales', SaleController::class)->only(['index', 'create', 'store', 'show']);
});