<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register', [UserController::class, 'store']);

    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authLogin']);
});


Route::get('/logout', [UserController::class, 'logout']);

Route::get('/search', [ProductController::class, 'search']);


Route::group(['prefix' => 'product', 'middleware' => 'auth'], function () {
    Route::get('/add', [ProductController::class, 'showAddProductPage']);
    Route::post('/add', [ProductController::class, 'add']);

    Route::group(['prefix' => '{id}', 'middleware' => 'seller'], function () {
        Route::get('/', [ProductController::class, 'detail'])->withoutMiddleware(['auth', 'seller']);
        Route::delete('/delete', [ProductController::class, 'delete']);
        Route::get('/update', [ProductController::class, 'showUpdateProductPage']);
        Route::put('/update', [ProductController::class, 'update']);
    });
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function () {

    Route::get('/', [CartController::class, 'index']);
    Route::post('/add/{product_id}', [CartController::class, 'add']);
    Route::delete('/delete/{product_id}', [CartController::class, 'delete']);
});

Route::group(['prefix' => 'transactions', 'middleware' => 'auth'], function () {

    Route::get('/', [TransactionController::class, 'index']);
    Route::get('/{id}', [TransactionController::class, 'show']);
});