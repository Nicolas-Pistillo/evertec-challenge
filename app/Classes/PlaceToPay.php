<?php 

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use DateTime;
use Illuminate\Support\Facades\Http;

class PlaceToPay 
{
    public Order $order;
    public Product $product;

    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
    }

    public function getWebCheckout()
    {
        $nonce = Str::random(8);

        $seed = (new DateTime())->format('c');

        $expiration = date('c', strtotime('+2 hours'));

        $trankey = base64_encode(sha1($nonce . $seed . env('PLACETOPAY_SECRET'), true));

        $params = [
            'locale' => env('APP_LOCALE'),
            'auth' => [
                'login'     => env('PLACETOPAY_LOGIN'),
                'tranKey'   => $trankey,
                'nonce'     => base64_encode($nonce),
                'seed'      => $seed
            ],
            'payer' => [
                'document'      => '1122334455',
                'documentType'  => 'CC',
                'name'          => "John",
                'surname'       => "Doe",
                'company'       => "Evertec",
                'email'         => "johndoe@app.com",
                'mobile'        => "+573114785542",
                'address'       => [
                    'street'     => 'Calle falsa 123',
                    'city'       => 'Medellín',
                    'state'      => 'Poblado',
                    'postalCode' => '55555',
                    'country'    => 'Colombia',
                    'phone'      => '+573114785542'
                ]
            ],
            'buyer' => [
                'document'      => '1122334455',
                'documentType'  => 'CC',
                'name'          => "John",
                'surname'       => "Doe",
                'company'       => "Evertec",
                'email'         => "johndoe@app.com",
                'mobile'        => "+573114785542",
                'address'       => [
                    'street'     => 'Calle falsa 123',
                    'city'       => 'Medellín',
                    'state'      => 'Poblado',
                    'postalCode' => '55555',
                    'country'    => 'Colombia',
                    'phone'      => '+573114785542'
                ]
            ],
            'payment' => [
                'reference'     => '1122334455',
                'description'   => 'Prueba test',
                'amount'        => [
                    'currency' => 'COP',
                    'total'    => 1500
                ]
            ],
            'expiration'  => $expiration,
            'returnUrl'   => 'http://localhost:8000/placetopay/return',
            'cancelUrl'   => 'http://localhost:8000/placetopay/cancel',
            'ipAddress'   => '127.0.0.1',
            'userAgent'   => 'PlacetoPay Sandbox'
        ];

        $request = Http::post('https://checkout-co.placetopay.dev/api/session', $params);

        dd($request->object());
    }
}