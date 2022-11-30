<?php

// use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\HomeController;
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
// Route::get('/', [HomeController::class, 'index']);
// Route::get('/transaksi', [HomeController::class, 'transaksi'])->name('transaksi')->middleware('auth');
// Route::get('/regist', [AuthController::class, 'regist'])->name('regist');
// Route::get('/login-form', [AuthController::class, 'loginForm'])->name('login-form');
// Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');
// Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticated']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::prefix('application')->name('application.')->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index']);
        Route::post('/get-char-user', [CartController::class, 'getCartUser'])->name('get-char-user');

        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::get('/create', [ProductController::class, 'create']);
            Route::post('/store', [ProductController::class, 'store']);
        });

        Route::prefix('cart')->name('cart.')->group(function () {
            Route::get('/', [CartController::class, 'index'])->name('index');
            Route::post('/get-coupon', [CartController::class, 'getCoupon'])->name('get-coupon');
            Route::post('/change-qty-coupon', [CartController::class, 'changeQtyCoupon'])->name('change-qty-coupon');
            Route::post('/delete-coupon', [CartController::class, 'deleteCoupon'])->name('delete-coupon');
            Route::get('/{productId}', [CartController::class, 'find'])->name('find');
        });
    });
});