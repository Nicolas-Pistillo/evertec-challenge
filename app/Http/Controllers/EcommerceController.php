<?php

namespace App\Http\Controllers;

use App\Classes\PlaceToPay;
use App\Http\Requests\CheckoutPaymentRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EcommerceController extends Controller
{
    /**
     * Catálogo de productos
     */
    public function index()
    {
        return view('ecommerce.catalog', ['products' => Product::all()]);
    }

    /**
     * Detalles de producto e ingreso de datos para comprarlo
     */
    public function checkout(Product $product)
    {
        return view('ecommerce.checkout', compact('product'));
    }

    /**
     * Creación y redireccion al WebCheckout para pagar
     */
    public function openWebCheckout(CheckoutPaymentRequest $request, Product $product)
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

        $ptpSession = $ptp->createSession();

        if (!$ptpSession) return back()->with('service_error', true);

        $order->update(['ptp_session_id' => $ptpSession->id]);

        return redirect($ptpSession->process_url);
    }
}
