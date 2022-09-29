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

    public function payProduct(CheckoutPaymentRequest $request, Product $product)
    {
        $order = Order::create([
            'reference'         => strtoupper(Str::random(6)),
            'product_id'        => $product->id,
            'customer_name'     => $request->customer_name,
            'customer_email'    => $request->customer_email,
            'customer_mobile'   => $request->customer_mobile,
            'status'            => 'CREATED'
        ]);

        $ptp = new PlaceToPay($order, $product);
    }
}
