<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('allUsers', [UserController::class, 'show']);
Route::post('getUserByID/{id}', [UserController::class, 'showuser']);

 //Products
Route::post('addProduct', [ProductController::class, 'addProduct']);
Route::get('getAllProduct', [ProductController::class, 'getAllProduct']);
Route::get('getProductByID/{id}', [ProductController::class, 'getProductByID']);

route::put('updateProduct/{id}', [ProductController::class, 'updateProduct']);
