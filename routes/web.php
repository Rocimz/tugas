<?php

use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\utamacontroller;
use Illuminate\Support\Facades\Route;

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

Route::resource('home', utamacontroller::class);
Route::resource('', utamacontroller::class);
Route::resource('/produk', ProdukController::class);
Route::resource('/kategori', kategoricontroller::class);
Route::resource('/post', postcontroller::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
