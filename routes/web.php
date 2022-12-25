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

// Route::get('/', function () {return view('frontends.index');});
// Route::get('/login', function () {return view('auth.login');});
// Route::get('/register', function () {return view('frontends.register');});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'frontend_index'])->name('frontend-index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/shop/getcity', [App\Http\Controllers\ShopController::class, 'getCity'])->name('shop-getcity');
Route::get('/shop/getcost', [App\Http\Controllers\ShopController::class, 'getCost'])->name('shop-getcost');
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'product'])->name('show-product');

// Transaksi dan Invoice
Route::get('shop/buy', [App\Http\Controllers\TransaksiController::class, 'index'])->name('product-buy');
Route::post('shop/buy/transaksi', [App\Http\Controllers\TransaksiController::class, 'store'])->name('product-deal');
Route::get('shop/buy/invoice/{id}', [App\Http\Controllers\TransaksiController::class, 'index_invoice'])->name('product-invoice');

// Komentar
Route::post('shop/buy/komentar/', [App\Http\Controllers\KomentarController::class, 'store'])->name('add-comment');

// contact
Route::resource('/contact', App\Http\Controllers\ContactController::class);

Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'product'])->name('show-product');
Route::get('/register', [App\Http\Controllers\HomeController::class, 'frontend_register'])->name('frontend-register');
