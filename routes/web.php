<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ProductController::class, 'index']);

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authLogin']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/search', [ProductController::class, 'search']);

Route::prefix('product')->group(function () {
    Route::get('/add', [ProductController::class, 'showAddProductPage']);
    Route::post('/add', [ProductController::class, 'add']);

    Route::prefix('{id}')->group(function () {
        Route::get('/', [ProductController::class, 'detail']);
        Route::delete('/delete', [ProductController::class, 'delete']);
    });
});
