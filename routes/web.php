<?php

use App\Http\Controllers\EcommerceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EcommerceController::class, 'index'])->name('ecommerce.index');
