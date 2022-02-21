<?php

use App\Http\Controllers\ProductController;
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
    return view('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/create', [ProductController::class, 'create'])->name('dashboard_create');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/edit/{id}', [ProductController::class, 'edit'])->name('dashboard_edit');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/show/{id}', [ProductController::class, 'show'])->name('dashboard_show');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/store', [ProductController::class, 'store'])->name('dashboard_store');
Route::middleware(['auth:sanctum', 'verified'])->put('/dashboard/update', [ProductController::class, 'update'])->name('dashboard_update');
Route::middleware(['auth:sanctum', 'verified'])->delete('/dashboard/destroy', [ProductController::class, 'destroy'])->name('dashboard_destroy');

Route::post('/api/products/get', [App\Http\Controllers\Api\ProductController::class, 'get'])->name('api_products_get');
