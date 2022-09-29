<?php 

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use DateTime;

class PlaceToPay 
{
    public static function pay(Order $order, Product $product)
    {
        $nonce = Str::random(8);

        $seed = (new DateTime())->format('c');

        $expiration = date('c', strtotime('+2 hours'));

        $trankey = base64_encode(sha1($nonce . $seed . env('PLACETOPAY_SECRET'), true));
    }
}