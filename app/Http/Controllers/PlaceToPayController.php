<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controlador para manejo de callbacks al pagar o cancelar una compra
 * desde el servicio de PlaceToPay
 */
class PlaceToPayController extends Controller
{
    public function return(Request $request)
    {
        dd($request);
    }

    public function cancel(Request $request)
    {
        dd($request);
    }
}
