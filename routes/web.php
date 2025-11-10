<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleItemController;
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

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');




Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);    
Route::resource('products', ProductController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('sales', SaleController::class);
Route::resource('sale-items', SaleItemController::class);
Route::resource('settings', SettingController::class);
});

// ------------------- Cashier Routes -------------------
Route::prefix('cashier')->middleware(['auth', 'role:staff'])->group(function () {
    Route::get('dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    // Optionally, cashier can have access to sales only:
    Route::resource('sales', SaleController::class)->only(['index', 'create', 'store', 'show']);
});