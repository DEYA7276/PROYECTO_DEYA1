<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AddressController;
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
  
Route::get('/', function () {
    return view('index');
}) ->name('index');

/*Route::get('/products', function () {
    return view('products_index');
}) ->name('products');
*/

/*
Route::get('/indexProducts',[App\Http\Controllers\ProductController::class,'index'])->name('products');



Route::get('/createProducts',[App\Http\Controllers\ProductController::class,'create'])->name('pcreate');


Route::get('/storeProducts/{store}',[App\Http\Controllers\ProductController::class,'store'])->name('pstore');

Route::get('/editProducts/{product}/edit',[App\Http\Controllers\ProductController::class,'edit'])->name('pedit');

Route::get('/updateProducts/{product}',[App\Http\Controllers\ProductController::class,'update'])->name('pupdate');

Route::get('/showProducts/{product}',[App\Http\Controllers\ProductController::class,'show'])->name('pshow');

Route::delete('/destroyProducs/{product}',App\Http\Controllers\ProductController::class,'destroy')->name('pdestroy');
Route::get('/indexProducts', [App\Http\Controllers\ProductController::class, 'index'])-> name('products');

Route::get('/createProducts', [App\Http\Controllers\ProductController::class, 'create'])-> name('pcreate');

Route::get('/storeProducts/{store}', [App\Http\Controllers\ProductController::class, 'store'])-> name('psotre');

Route::get('/updateProducts/{product}', [App\Http\Controllers\ProductController::class, 'update'])-> name('pupdate');

Route::get('/destroyProducts{$product}', [App\Http\Controllers\ProductController::class, 'destroy'])-> name('pdestroy');

Route::get('/editProducts/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])-> name('pedit');

Route::get('/showProducts/{product}', [App\Http\Controllers\ProductController::class, 'show'])-> name('pshow');
*/
Route::resource('/products',App\Http\Controllers\ProductController::class);

Route::resource('/brands',App\Http\Controllers\BrandController::class);

Route::get('/clients', function () {
    return view('admin/clients/index');
}) ->name('clients');


Route::get('/sales', function () {
    return view('admin/sale/index');
}) ->name('sales');

Route::put('/brands/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name('brands.update');

Route::get('/products/{product}/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('products.delete');


Route::resource('/clients',App\Http\Controllers\ClientController::class);

Route::resource('/addresses', App\Http\Controllers\AddressController::class);


Route::get('clients/{client}/delete', [ClientController::class, 'destroyConfirm'])->name('clients.destroyConfirm');
Route::resource('/sales',App\Http\Controllers\SaleController::class);

Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('clients/{client}/delete', [ClientController::class, 'destroyConfirm'])->name('clients.destroyConfirm');

Route::get('clients/{client}/delete', [ClientController::class, 'destroyConfirm'])->name('clients.destroyConfirm');
Route::resource('clients', ClientController::class);

Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('products/{product}/delete', [ProductController::class, 'destroyConfirm'])->name('products.destroyConfirm');


Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
Route::get('brands/{brand}/delete', [BrandController::class, 'destroyConfirm'])->name('brands.destroyConfirm');


Route::delete('addresses/{address}', [AddressController::class, 'destroy'])->name('address.destroy');
Route::get('addresses/{address}/delete', [AddressController::class, 'destroyConfirm'])->name('address.destroyConfirm');


Route::delete('sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');
Route::get('sales/{sale}/delete', [SaleController::class, 'destroyConfirm'])->name('sales.destroyConfirm');
