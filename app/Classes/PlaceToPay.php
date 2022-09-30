<?php 

namespace App\Classes;

use App\Models\Order;
use App\Models\PlaceToPaySession;
use App\Models\Product;
use DateInterval;
use Illuminate\Support\Str;
use DateTime;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PlaceToPay 
{
    private Order $order;
    private Product $product;

    private const BASE_URL = 'https://checkout-co.placetopay.dev/api/';

    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
    }

    private static function createAuthFields()
    {
        $nonce = Str::random(8);

        $seed = (new DateTime())->format('c');

        $trankey = base64_encode(sha1($nonce . $seed . env('PLACETOPAY_SECRET'), true));

        return [
            'login'   => env('PLACETOPAY_LOGIN'),
            'tranKey' => $trankey,
            'nonce'   => base64_encode($nonce),
            'seed'    => $seed
        ];
    }

    public function createSession()
    {
        // El cliente tiene 3 horas para pagar
        $dt = new DateTime();
        $expiration = $dt->add(new DateInterval('PT3H'));

        $clientData = [
            'document'      => '1122334455',
            'documentType'  => 'CC',
            'name'          => $this->order->customer_name,
            'surname'       => "Test",
            'company'       => "Evertec",
            'email'         => $this->order->customer_email,
            'mobile'        => $this->order->customer_mobile,
            'address'       => [
                'street'     => 'Calle falsa 123',
                'city'       => 'Medellín',
                'state'      => 'Poblado',
                'postalCode' => '55555',
                'country'    => 'Colombia',
                'phone'      => '+573114785542'
            ]
        ];

        $params = [
            'locale' => env('APP_LOCALE'),
            'auth' => self::createAuthFields(),
            'payer' => $clientData,
            'buyer' => $clientData,
            'payment' => [
                'reference'     => $this->order->reference,
                'description'   => 'Compra de prueba',
                'amount'        => [
                    'currency' => 'COP',
                    'total'    => $this->product->price
                ],
                'items' => [
                    [
                        'sku'       => $this->product->sku,
                        'name'      => $this->product->name,
                        'category'  => 'physical',
                        'qty'       => '1',
                        'price'     => $this->product->price
                    ]
                ]
            ],
            'expiration'  => $expiration->format('c'),
            'returnUrl'   => route('placetopay.callback'),
            'cancelUrl'   => route('placetopay.callback'),
            'ipAddress'   => '127.0.0.1',
            'userAgent'   => 'PlacetoPay Sandbox'
        ];

        $response = Http::post(self::BASE_URL . 'session', $params)->object();

        if ($response->status->status === 'FAILED')
        {
            $msg = "Error al crear sesión: {$response->status->message}";
            Log::channel('placetopay')->error($msg);

            return false;
        }

        PlaceToPaySession::create([
            'request_id'   => $response->requestId,
            'process_url'  => $response->processUrl,
            'order_id'     => $this->order->id
        ]);

        session(['ptp_session' => $response->requestId]);

        return $response;

    }

    public static function getSessionInfo(int $requestId)
    {
        $response = Http::post(self::BASE_URL . "session/$requestId", [
            'auth' => self::createAuthFields()
        ]);

        return $response->object();
    }
}