<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EcommerceController extends Controller
{
    public function index()
    {
        $products = Http::get('https://fakestoreapi.com/products')->object();

        return view('ecommerce.catalog', compact('products'));
    }
}
