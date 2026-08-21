<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('products.category');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');

    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/add/{product}',[CartController::class,'add'])->name('cart.add');
    Route::patch('/cart/update/{id}',[CartController::class,'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
    Route::post('/cart/coupon',[CartController::class,'coupon'])->name('cart.coupon');

    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
    Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');

    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
    Route::get('/orders/{id}',[OrderController::class,'show'])->name('orders.show');

    Route::get('/payment/{orderId}',[PaymentController::class,'checkout'])->name('payment.checkout');
    Route::get('/payment/success/{orderId}',[PaymentController::class,'success'])->name('payment.success');
    Route::get('/payment/cancel/{orderId}',[PaymentController::class,'cancel'])->name('payment.cancel');
});

require __DIR__.'/auth.php';

$pages = ['about','collections','contact','faq','shipping','returns','privacy','terms','careers','blog','gallery','team','portfolio'];
foreach ($pages as $page) {
    Route::get('/'.$page, [PageController::class,'show'])->defaults('page',$page)->name($page);
}

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
| The /admin panel is provided by Filament. Keeping it out of web.php
| preserves Filament's native CRUD, authentication and resource routing.
*/
