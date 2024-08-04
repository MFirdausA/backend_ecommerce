<?php

use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',[userController::class, 'fetch']);
    Route::post('user', [userController::class, 'updateProfile']);
    Route::post('logout', [userController::class, 'logout']);
    
    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
    
});

Route::get('products', [ProductController::class, 'all']);
Route::get('categories', [ProductCategoryController::class, 'all']);

Route::post('register', [userController::class, 'register']);
Route::post('login', [userController::class, 'login']);