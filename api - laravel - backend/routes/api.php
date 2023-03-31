<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::get('/categories/{id?}', [CategoryController::class, 'show']);
Route::put('/categories/update/{id?}', [CategoryController::class, 'update']);
Route::delete('/categories/{id?}', [CategoryController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products/store', [ProductController::class, 'store']);
Route::get('/products/{id?}', [ProductController::class, 'show']);
Route::put('/products/update/{id?}', [ProductController::class, 'update']);
Route::delete('/products/{id?}', [ProductController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders/store', [OrderController::class, 'store']);
Route::put('/orders/update/{id?}', [OrderController::class, 'update']);
Route::delete('/orders/{id?}', [OrderController::class, 'destroy']);
