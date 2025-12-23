<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProfileApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// PRODUCTS API
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);
// CREATE product
Route::post('/products', [ProductApiController::class, 'store']);

// UPDATE product
Route::put('/products/{id}', [ProductApiController::class, 'update']);

// DELETE product
Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);