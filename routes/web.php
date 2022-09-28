<?php

use App\Http\Controllers\EcommerceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EcommerceController::class, 'index'])->name('ecommerce.index');

Route::get('checkout/{product}', [EcommerceController::class, 'checkout'])
    ->name('ecommerce.checkout');