<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupermarketController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('products.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('products.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('products.store');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('products.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('products.destroy');
Route::get('/category/{id}/products', [CategoryController::class, 'getProducts']);






