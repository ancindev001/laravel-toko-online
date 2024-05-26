<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Auth::routes();




Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('product', ProductController::class);
});



Route::middleware('auth')->group(function () {

    //profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/{user}/update', [ProfileController::class, 'update'])->name('profile.update');

    // cart
    Route::get("cart", [CartController::class, 'index'])->name('cart.index');
    Route::put("cart", [CartController::class, 'update'])->name('cart.update');
    Route::get("/cart/{product}", [CartController::class, 'store'])->name('cart.create');
    // order
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{order}/show', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order/{order}/update', [OrderController::class, 'update'])->name('order.update');

    // checkout
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
    Route::get("/dashboard", [DashboardController::class, 'index'])->name('dashboard');
});
