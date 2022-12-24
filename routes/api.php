<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupermarketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*User*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*Products*/
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

/*Category*/
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{id}/products', [CategoryController::class, 'getProducts']);
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

/*Supermarket*/
Route::get('/supermarkets', [SupermarketController::class, 'index'])->name('supermarket.index');
Route::get('/supermarkets/{id}', [SupermarketController::class, 'show'])->name('supermarket.show');
Route::get('/supermarket/{id}/products', [SupermarketController::class, 'getProducts']);
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/supermarkets', [SupermarketController::class, 'store'])->name('supermarket.store');
    Route::put('/supermarkets/{id}', [SupermarketController::class, 'update'])->name('supermarket.update');
    Route::delete('/supermarkets/{id}', [SupermarketController::class, 'destroy'])->name('supermarket.destroy');
});

Route::get('/wishlists', [CartController::class, 'index'])->name('wishlist.index');
Route::get('/wishlists/{id}', [CartController::class, 'show'])->name('wishlist.show');

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/wishlists', [CartController::class, 'store'])->name('wishlist.store');
    Route::put('/wishlists/{id}', [CartController::class, 'update'])->name('wishlist.update');
    Route::delete('/wishlists/{id}', [CartController::class, 'destroy'])->name('wishlist.destroy');
});


