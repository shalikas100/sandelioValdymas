<?php

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
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Client
// Vaizdas
Route::get('/clients/index', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('/clients/show/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/edit/{client}', [ClientController::class, 'edit'])->name('clients.edit');
Route::get('/clients/searchAjax', [ClientController::class, 'searchAjax'])->name('clients.searchAjax');

// veiksmas
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::post('/clients/storeAjax', [ClientController::class, 'storeAjax'])->name('clients.storeAjax');
Route::post('/clients/update/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::post('/clients/destroy/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

// Products
// Vaizdas
Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/products/searchAjax', [ProductController::class, 'searchAjax'])->name('products.searchAjax');

// veiksmas
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');



// Orders
Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::get('/orders/show/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/createProducts', [OrderController::class, 'createProducts'])->name('orders.createProducts');

Route::post('/orders/storeProducts', [OrderController::class, 'storeProducts'])->name('orders.storeProducts');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');



