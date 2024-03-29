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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/{user}/editar', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');

Route::get('/products', [App\Http\Controllers\ProductoController::class, 'index'])->name('products');
Route::get('/products/{producto}/editar', [App\Http\Controllers\ProductoController::class, 'edit'])->name('products.edit');
Route::put('/products/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('products.update');