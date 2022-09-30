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
    private array $clientData;

    private const BASE_URL = 'https://checkout-co.placetopay.dev/api/';

    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;

        $this->fillClientData();
    }

    /**
     * Crea los atributos de autorizacion necesarios para cada peticion
     * @return array
     */
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

    /**
     * Crea el campo de datos del cliente (payer y buyer), asumiendo que el
     * mismo comprador es el que pagará la compra
     * @return void
     */
    public function fillClientData()
    {
        $this->clientData = [
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
    }

    /**
     * Solicita una nueva sesión de pago al servicio
     * @return PlaceToPaySession|bool
     */
    public function createSession()
    {
        // El cliente tiene 3 horas para pagar
        $dt = new DateTime();
        $expiration = $dt->add(new DateInterval('PT3H'));

        $params = [
            'locale' => env('APP_LOCALE'),
            'auth' => self::createAuthFields(),
            'payer' => $this->clientData,
            'buyer' => $this->clientData,
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

        $ptpSession = PlaceToPaySession::create([
            'request_id'    => $response->requestId,
            'process_url'   => $response->processUrl,
            'order_id'      => $this->order->id,
            'expiration'    => $expiration->format('Y-m-d H:i:s'),
            'status'        => 'PENDING',
            'message'       => 'La petición se encuentra pendiente'
        ]);

        // Guardamos el request Id de la sesión de pago actual
        session(['ptp_request_id' => $response->requestId]);

        // Y guardamos el ID del registro en la sesion del cliente
        session()->push('ptp_sessions_id', $ptpSession->id);

        return $ptpSession;
    }

    /**
     * Consulta la información de una sesión de pago segun su request ID
     * @return object|bool
     */
    public static function getSessionInfo(int $requestId)
    {
        $response = Http::post(self::BASE_URL . "session/$requestId", [
            'auth' => self::createAuthFields()
        ]);

        $info = $response->object();

        if (!$info || !isset($info->status)) return false;

        return $info;
    }
}