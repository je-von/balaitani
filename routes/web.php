<?php

use App\Http\Controllers\AdminController;
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

Route::get('/about-us', function () {
    return view('about');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register', [UserController::class, 'store']);

    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authLogin']);
});


Route::get('/register-seller', [UserController::class, 'registerSeller'])->middleware('not-seller');
Route::post('/register-seller', [UserController::class, 'storeSeller'])->middleware('not-seller');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/verify-seller', [AdminController::class, 'showSeller']);
    Route::post('/acceptSeller/{id}', [AdminController::class, 'acceptSeller']);
    Route::post('/declineSeller/{id}', [AdminController::class, 'declineSeller']);

    Route::get('/verify-transaction', [AdminController::class, 'showTransaction']);
    Route::post('/acceptTransaction/{id}', [AdminController::class, 'acceptTransaction']);
    Route::post('/declineTransaction/{id}', [AdminController::class, 'declineTransaction']);
});

Route::get('/logout', [UserController::class, 'logout']);


Route::get('/search', [ProductController::class, 'search']);



Route::group(['prefix' => 'product', 'middleware' => 'seller'], function () {
    Route::get('/add', [ProductController::class, 'showAddProductPage']);
    Route::post('/add', [ProductController::class, 'add']);
    Route::group(['prefix' => '{id}', 'middleware' => 'owner'], function () {
        Route::get('/', [ProductController::class, 'detail'])->withoutMiddleware(['owner', 'seller']);
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
    Route::post('/add', [TransactionController::class, 'add']);
    Route::get('/{id}', [TransactionController::class, 'show']);
});

Route::group(['prefix' => 'checkout', 'middleware' => 'auth'], function () {

    Route::get('/', [CartController::class, 'checkout']);
    Route::post('/', [TransactionController::class, 'add']);
});
