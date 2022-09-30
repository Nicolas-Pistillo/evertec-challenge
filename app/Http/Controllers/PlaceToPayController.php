<?php

namespace App\Http\Controllers;

use App\Classes\PlaceToPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Controlador para manejo de callbacks al pagar o cancelar una compra
 * desde el servicio de PlaceToPay
 */
class PlaceToPayController extends Controller
{
    public function __invoke(Request $request)
    {
        $ptpSession = session('ptp_session');

        $operation = PlaceToPay::getSessionInfo($ptpSession);

        dd($operation->payment);
    }
}
