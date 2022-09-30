<?php

use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\PlaceToPayController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EcommerceController::class, 'index'])->name('ecommerce.index');

Route::get('checkout/{product}', [EcommerceController::class, 'checkout'])
    ->name('ecommerce.checkout');

Route::post('checkout/{product}', [EcommerceController::class, 'openWebCheckout'])
    ->name('ecommerce.pay');

Route::get('placetopay/callback', PlaceToPayController::class)
    ->name('placetopay.callback');