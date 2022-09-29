<?php

namespace App\Http\Controllers;

use App\Classes\PlaceToPay;
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

        ]);

        $reference = strtoupper(Str::random(6));

        dd($reference);

        PlaceToPay::test();

        return PlacetoPayController::test();
    }
}
