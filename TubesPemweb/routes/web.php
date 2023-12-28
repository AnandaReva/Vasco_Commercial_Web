<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



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



Route::get('/vasco.com/home', function () {
    return view('loginView');
});

Route::get('/vasco.com/login', [AuthController::class, 'login'])->name('login');
Route::post('/vasco.com/login', [AuthController::class, 'authenticating']);
Route::get('/vasco.com/logout', [AuthController::class, 'logout']);



//Admin
Route::get('/vasco.com/admin/catalog', [AdminController::class, 'showCatalogAdmin'])->name('catalogAdmin.show');
Route::get('/vasco.com/admin/product/{idProduct}', [AdminController::class, 'detailProductAdmin'])->name('productAdmin.show');

Route::get('/vasco.com/admin/insertProduct', [AdminController::class, 'insertProductAdmin'])->name('productAdmin.insert');
/* Route::get('/vasco.com/admin/product/insert', [AdminController::class, 'insertProductAdmin'])->name('productAdmin.insert');
Route::post('/vasco.com/admin/product/store', [AdminController::class, 'storeProductAdmin'])->name('productAdmin.store'); */

/* 
Route::get('/vasco.com/admin/product/{idProduct}/edit', [AdminController::class, 'editProductAdmin'])->name('productAdmin.edit');
Route::post('/vasco.com/admin/product/{idProduct}/edit', [AdminController::class, 'updateProductAdmin'])->name('productAdmin.update');
Route::get('/vasco.com/admin/product/{idProduct}/delete', [AdminController::class, 'deleteProductAdmin'])->name('productAdmin.delete');
Route::get('/vasco.com/admin/product/{idProduct}/destroy', [AdminController::class, 'destroyProductAdmin'])->name('productAdmin.destroy'); */




//Customer


Route::get('/vasco.com', [CustomerController::class, 'landing'])->name('landing');

Route::get('/vasco.com/catalog', [CustomerController::class, 'showCatalog'])->name('catalog.show');
Route::get('/vasco.com/latest', [CustomerController::class, 'showNewArrival'])->name('newArrivalView.show');

Route::get('/vasco.com/category/{idCategory}', [CustomerController::class, 'showProductsPerCategory'])->name('category.show');

Route::get('/vasco.com/product/{idProduct}', [CustomerController::class, 'showProduct'])->name('product.show');

Route::post('/vasco.com/product/{idProduct}/order', [CustomerController::class, 'order'])->name('product.order');




