<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WEB\ProductController;
use App\Http\Controllers\WEB\CustomerController;
use App\Http\Controllers\WEB\CategoryProductController;
use App\Http\Controllers\WEB\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login']);

//ROUETE YANG DIGUNAKAN SEBAGAI LOGIN,REGISTER, DAN ETC
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//ROUTE  YANG DIGUNAKAN SEBAGAI DILAKUKANNYA SEMUA CRUD OLEH ADMIN     
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('', 'index')->name('customers');
        Route::get('create', 'create')->name('customers.create');
        Route::post('store', 'store')->name('customers.store');
        Route::get('show/{id}', 'show')->name('customers.show');
        Route::get('edit/{id}', 'edit')->name('customers.edit');
        Route::put('edit/{id}', 'update')->name('customers.update');
        Route::delete('destroy/{id}', 'destroy')->name('customers.destroy');
    });

    Route::controller(CategoryProductController::class)->prefix('categoryproduct')->group(function () {
        Route::get('', 'index')->name('categoryproduct');
        Route::get('create', 'create')->name('categoryproduct.create');
        Route::post('store', 'store')->name('categoryproduct.store');
        Route::get('show/{id}', 'show')->name('categoryproduct.show');
        Route::get('edit/{id}', 'edit')->name('categoryproduct.edit');
        Route::put('edit/{id}', 'update')->name('categoryproduct.update');
        Route::delete('destroy/{id}', 'destroy')->name('categoryproduct.destroy');
    });

    Route::controller(TransactionController::class)->prefix('transaction')->group(function () {
        Route::get('', 'index')->name('transaction');
        Route::get('create', 'create')->name('transaction.create');
        Route::post('store', 'store')->name('transaction.store');
        Route::get('show/{id}', 'show')->name('transaction.show');
        Route::get('edit/{id}', 'edit')->name('transaction.edit');
        Route::put('edit/{id}', 'update')->name('transaction.update');
        Route::delete('destroy/{id}', 'destroy')->name('transaction.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});