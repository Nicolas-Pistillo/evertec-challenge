<?php

namespace App\Http\Controllers;

use App\Models\PlaceToPaySession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required']
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('admin.orders');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function orders()
    {
        $orders = PlaceToPaySession::with('order.product')->get();
        return view('admin.orders', $orders);
    }
}
