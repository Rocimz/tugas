<?php

use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\utamacontroller;
use Illuminate\Support\Facades\Auth;
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

Route::resource('index', utamacontroller::class);
 Route::resource('', utamacontroller::class);
Route::resource('/produk', ProdukController::class)->middleware(['auth','pengelola']);
Route::resource('/kategori', kategoricontroller::class)->middleware(['auth','pengelola']);
Route::resource('/post', postcontroller::class)->middleware(['auth','pengelola']);;
Route::resource('/user', usercontroller::class)->middleware(['auth','pengelola']);;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
