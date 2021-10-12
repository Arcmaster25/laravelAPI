<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::prefix('users')->group(function () {
    //Get Routes for users
    Route::get('/', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    //Post Routes for users
    Route::post('/create/user', [UserController::class, 'store']);
    //Update Route for users
    Route::put('/update/user/{id}', [UserController::class, 'update']);
    //Delete Route for users
    Route::delete('/delete/user/{id}', [UserController::class, 'destroy']);
});

Route::prefix('products')->group(function () {
    //Get Routes for products
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    //Post Routes for products
    Route::post('/create/product', [ProductController::class, 'store']);
    //Update Route for products
    Route::put('/update/product/{id}', [ProductController::class, 'update']);
    //Delete Routes for products
    Route::delete('/delete/product/{id}', [ProductController::class, 'destroy']);
});