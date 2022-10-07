<?php

namespace App\Http\Controllers;

use App\Classes\PlaceToPay;
use App\Models\PlaceToPaySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Controlador para manejo de callbacks al pagar o cancelar una compra
 * desde el web checkout de PlaceToPay
 */
class PlaceToPayController extends Controller
{
    public function __invoke()
    {
        $ptpRequestId = session('ptp_request_id');

        $operation = PlaceToPay::getSessionInfo($ptpRequestId);

        if (!$operation) return back();

        $ptpSession = PlaceToPaySession::where('request_id', $ptpRequestId)
                        ->with('order.product')
                        ->first(); 

        if ($operation->status->status != $ptpSession->status)
        {
            $ptpSession->update([
                'status'  => $operation->status->status,
                'message' => $operation->status->message
            ]);
        }

        return view('ecommerce.purchase-result', [
            'status'   => $operation->status->status,
            'purchase' => $ptpSession
        ]);

    }
}
