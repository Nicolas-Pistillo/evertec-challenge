<?php

namespace App\Http\Controllers;

use App\Classes\PlaceToPay;
use App\Enums\OrderStatus;
use App\Http\Requests\CheckoutPaymentRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index()
    {
        return view('ecommerce.catalog', ['products' => Product::all()]);
    }

    public function checkout(Product $product)
    {
        return view('ecommerce.checkout', compact('product'));
    }

    public function openWebCheckout(CheckoutPaymentRequest $request, Product $product)
    {
        /**
         * Tarjeta de prueba
         * 
         * Numero: 4012888888881881
         * Expiracion: 11/28
         * CVV: 917
        */

        $order = Order::create([
            'reference'         => strtoupper(Str::random(6)),
            'product_id'        => $product->id,
            'customer_name'     => $request->customer_name,
            'customer_email'    => $request->customer_email,
            'customer_mobile'   => $request->customer_mobile,
            'status'            => 'CREATED'
        ]);

        $ptp = new PlaceToPay($order, $product);

        $session = $ptp->createSession();

        if (!$session) dd('ERROOOOOR');

        return redirect($session->processUrl);

    }
}
