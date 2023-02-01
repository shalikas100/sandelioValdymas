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
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;





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
Route::post('/clients/update/{client}', [ClientController::class, 'update'])->name('clients.update')->middleware('auth');
Route::post('/clients/destroy/{client}', [ClientController::class, 'destroy'])->name('clients.destroy')->middleware('auth');


// Manufacturer
// Vaizdas
Route::get('/manufacturers/index', [ManufacturerController::class, 'index'])->name('manufacturers.index')->middleware('auth');
Route::get('/manufacturers/create', [ManufacturerController::class, 'create'])->name('manufacturers.create')->middleware('auth');
Route::get('/manufacturers/show/{manufacturer}', [ManufacturerController::class, 'show'])->name('manufacturers.show')->middleware('auth');
Route::get('/manufacturers/edit/{manufacturer}', [ManufacturerController::class, 'edit'])->name('manufacturers.edit')->middleware('auth');
Route::get('/manufacturers/searchAjax', [ManufacturerController::class, 'searchAjax'])->name('manufacturers.searchAjax')->middleware('auth');
// veiksmas
Route::post('/manufacturers/store', [ManufacturerController::class, 'store'])->name('manufacturers.store')->middleware('auth');
Route::post('/manufacturers/update/{manufacturer}', [ManufacturerController::class, 'update'])->name('manufacturers.update')->middleware('auth');
Route::post('/manufacturers/destroy/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('manufacturers.destroy')->middleware('auth');



// Product
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


// Order
//vaizdas
Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create')->middleware('auth');
Route::get('/orders/edit/{order}', [OrderController::class, 'edit'])->name('orders.edit')->middleware('auth'); 
Route::get('/orders/show/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');
Route::get('/orders/createProducts', [OrderController::class, 'createProducts'])->name('orders.createProducts')->middleware('auth');
// veiksmas
Route::post('/orders/storeProducts', [OrderController::class, 'storeProducts'])->name('orders.storeProducts')->middleware('auth');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');
Route::post('/orders/update/{order}', [OrderController::class, 'update'])->name('orders.update')->middleware('auth');
Route::post('/orders/destroy/{order}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('auth');


// OrderDetail
Route::get('/orderDetails/index', [OrderDetailController::class, 'index'])->name('orderDetails.index')->middleware('auth');
//Veiksmas
Route::post('/orderDetails/destroy/{orderDetail}', [OrderDetailController::class, 'destroy'])->name('orderDetails.destroy')->middleware('auth');


// Invoice
// Vaizdas
Route::get('/invoices/index', [InvoiceController::class, 'index'])->name('invoices.index')->middleware('auth');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create')->middleware('auth');
Route::get('/invoices/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoices.edit')->middleware('auth'); 
Route::get('/invoices/show/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show')->middleware('auth');
Route::get('/invoices/createProducts', [InvoiceController::class, 'createProducts'])->name('invoices.createProducts')->middleware('auth');
Route::get('/invoices/searchAjax', [InvoiceController::class, 'searchAjax'])->name('invoices.searchAjax')->middleware('auth');
// veiksmas
Route::post('/invoices/storeProducts', [InvoiceController::class, 'storeProducts'])->name('invoices.storeProducts')->middleware('auth');
Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store')->middleware('auth');
Route::post('/invoices/update/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update')->middleware('auth');
Route::post('/invoices/destroy/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy')->middleware('auth');


// InvoiceDetail
Route::get('/invoiceDetails/index', [InvoiceDetailController::class, 'index'])->name('invoiceDetails.index')->middleware('auth');
//Veiksmas
Route::post('/invoiceDetails/destroy/{invoiceDetail}', [InvoiceDetailController::class, 'destroy'])->name('invoiceDetails.destroy')->middleware('auth');






