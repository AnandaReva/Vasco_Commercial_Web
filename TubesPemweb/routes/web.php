<?php

use App\Http\Controllers\CustomerController;
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






Route::get('/vasco.com', [CustomerController::class, 'landing'])->name('landing');

Route::get('/vasco.com/catalog', [CustomerController::class, 'showCatalog'])->name('catalog.show');
Route::get('/vasco.com/latest', [CustomerController::class, 'showNewArrival'])->name('newArrivalView.show');

Route::get('/vasco.com/category/{idCategory}', [CustomerController::class, 'showProductsPerCategory'])->name('category.show');

Route::get('/vasco.com/product/{idProduct}', [CustomerController::class, 'showProduct'])->name('product.show');

Route::post('/vasco.com/product/{idProduct}/order', [CustomerController::class, 'order'])->name('product.order');




