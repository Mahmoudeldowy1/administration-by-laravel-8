<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Login And Logout
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/logout',  [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

    //Routes For admin Panel
Route::middleware('auth')->group(function () {

    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.index');

    //Routes For Customers
    Route::get('/admin/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('/admin/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('/admin/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('/admin/customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/admin/customers/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/admin/customers/{id}/destroy', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');

    //Routes For Shops
    Route::get('/admin/Shops', [App\Http\Controllers\ShopController::class, 'index'])->name('shops.index');
    Route::get('/admin/Shops/create', [App\Http\Controllers\ShopController::class, 'create'])->name('shops.create');
    Route::post('/admin/Shops', [App\Http\Controllers\ShopController::class, 'store'])->name('shops.store');
    Route::get('/admin/Shops/{id}/edit', [App\Http\Controllers\ShopController::class, 'edit'])->name('shops.edit');
    Route::put('/admin/Shops/{id}', [App\Http\Controllers\ShopController::class, 'update'])->name('shops.update');
    Route::delete('/admin/Shops/{id}/destroy', [App\Http\Controllers\ShopController::class, 'destroy'])->name('shops.destroy');

    //Routes For Items
    Route::get('/admin/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
    Route::get('/admin/items/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
    Route::post('/admin/items', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
    Route::get('/admin/items/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
    Route::put('/admin/items/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
    Route::delete('/admin/items/{id}/destroy', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');
});

