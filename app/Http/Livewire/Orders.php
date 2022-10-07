<?php

namespace App\Http\Livewire;

use App\Models\PlaceToPaySession;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Orders extends Component
{
    public $purchases; // Sesiones registradas de Place to Pay

    public function mount()
    {
        $this->purchases = collect();

        if (Session::exists('ptp_sessions_id'))
        {
            $ids = Session::get('ptp_sessions_id');

            $models = PlaceToPaySession::whereIn('id', $ids)
                        ->with('order.product')
                        ->get();

            $this->purchases = $models;
        }
    }

    public function clearOrders()
    {
        Session::flush();
    }

    public function render()
    {
        return view('livewire.orders');
    }
}
