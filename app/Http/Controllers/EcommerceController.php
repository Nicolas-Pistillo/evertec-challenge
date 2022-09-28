<?php

namespace App\Http\Controllers;

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
}
