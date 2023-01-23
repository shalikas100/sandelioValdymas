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
Route::get('/clients/index', [ClientController::class, 'index'])->name('clients.index')->middleware('auth');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('auth');
Route::get('/clients/show/{client}', [ClientController::class, 'show'])->name('clients.show')->middleware('auth');
Route::get('/clients/edit/{client}', [ClientController::class, 'edit'])->name('clients.edit')->middleware('auth');
Route::get('/clients/searchAjax', [ClientController::class, 'searchAjax'])->name('clients.searchAjax')->middleware('auth');

// veiksmas
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store')->middleware('auth');
Route::post('/clients/storeAjax', [ClientController::class, 'storeAjax'])->name('clients.storeAjax')->middleware('auth');
Route::post('/clients/update/{client}', [ClientController::class, 'update'])->name('clients.update')->middleware('auth');
Route::post('/clients/destroy/{client}', [ClientController::class, 'destroy'])->name('clients.destroy')->middleware('auth');

// Products
// Vaizdas
Route::get('/products/index', [ProductController::class, 'index'])->name('products.index')->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth');
Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('products.show')->middleware('auth');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');
Route::get('/products/searchAjax', [ProductController::class, 'searchAjax'])->name('products.searchAjax')->middleware('auth');

// veiksmas
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store')->middleware('auth');
Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
Route::post('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');




// Orders
Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create')->middleware('auth');
Route::get('/orders/show/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');
Route::get('/orders/createProducts', [OrderController::class, 'createProducts'])->name('orders.createProducts')->middleware('auth');

Route::post('/orders/storeProducts', [OrderController::class, 'storeProducts'])->name('orders.storeProducts')->middleware('auth');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');
Route::post('/orders/destroy/{order}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('auth');


// OrderDetails

Route::get('/orderDetails/index', [OrderDetailController::class, 'index'])->name('oredrDetails.index')->middleware('auth');

Route::post('/orderDetails/destroy/{orderDetail}', [OrderDetailController::class, 'destroy'])->name('orderDetails.destroy')->middleware('auth');




