<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogOutController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\CategoryProductController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;

// Login
Route::post('/login', LoginController::class)->name('login');

Route::group(['middleware' => ['auth:api']], function () {
    // Customer (Master Table)
    Route::get('/customer', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::post('/customer/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    // Category Product (Master Table)
    Route::get('/category-product', [CategoryProductController::class, 'index'])->name('kategori-produk.index');
    Route::post('/category-product', [CategoryProductController::class, 'store'])->name('kategori-produk.store');
    Route::get('/category-product/{id}', [CategoryProductController::class, 'show'])->name('kategori-produk.show');
    Route::post('/category-product/{id}', [CategoryProductController::class, 'update'])->name('kategori-produk.update');
    Route::delete('/category-product/{id}', [CategoryProductController::class, 'destroy'])->name('kategori-produk.destroy');

    // Product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Transaction
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::post('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

    // Logout
    Route::post('/logout', LogOutController::class)->name('logout');
});