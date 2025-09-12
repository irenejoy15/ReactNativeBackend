<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
Route::post('/rn1/auth/login', [AuthController::class, 'login']);
Route::post('/rn1/auth/register', [AuthController::class, 'register']);
Route::get('/rn1/products', [ProductController::class, 'index']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
