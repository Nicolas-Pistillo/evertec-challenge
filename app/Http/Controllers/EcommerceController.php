<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutPaymentRequest;
use App\Models\Product;
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
        dd($request->validated(), $product);
    }
}
