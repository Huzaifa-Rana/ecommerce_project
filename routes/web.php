<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');

// Authentication routes (already added by Laravel UI bootstrap auth)
Auth::routes();

// Group routes for admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
});

// Cart and Checkout routes accessible by all users (guest or logged-in)
// To allow guests to add to cart without login, no auth middleware here

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');


// Checkout routes - only for authenticated customers
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout/process', [CheckoutController::class, 'createCheckoutSession'])->name('checkout.process');
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
});