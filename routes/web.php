<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\PlaceToPayController;
use Illuminate\Support\Facades\Route;

// Catalogo de productos
Route::get('/', [EcommerceController::class, 'index'])->name('ecommerce.index');

// Detalles de producto
Route::get('checkout/{product}', [EcommerceController::class, 'checkout'])
    ->name('ecommerce.checkout');

// Iniciar compra de producto
Route::post('checkout/{product}', [EcommerceController::class, 'openWebCheckout'])
    ->name('ecommerce.pay');

// Callback de PlaceToPay al finalizar una transaccion
Route::get('placetopay/callback', PlaceToPayController::class)
    ->name('placetopay.callback');

// Pantalla de login para adminstrador de tienda
Route::view('admin', 'admin.index')->name('admin.index')->middleware('guest');

// Inicio de sesion para administradores
Route::post('login', [AdminController::class, 'login'])->name('admin.login');

// Cierre de sesion
Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout')
    ->middleware('auth');

// Ordenes de la tienda
Route::get('admin/orders', [AdminController::class, 'orders'])->name('admin.orders')
    ->middleware('auth');