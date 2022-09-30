<?php

namespace App\Observers;

use App\Models\PlaceToPaySession;

class PlaceToPayObserver
{
    /**
     * Handle the PlaceToPaySession "created" event.
     *
     * @param  \App\Models\PlaceToPaySession  $placeToPaySession
     * @return void
     */
    public function created(PlaceToPaySession $placeToPaySession)
    {
        //
    }

    /**
     * Handle the PlaceToPaySession "updated" event.
     *
     * @param  \App\Models\PlaceToPaySession  $placeToPaySession
     * @return void
     */
    public function updated(PlaceToPaySession $placeToPaySession)
    {
        if ($placeToPaySession->status === 'APPROVED')
        {
            $placeToPaySession->order->update(['status' => 'PAYED']);
        }

        if ($placeToPaySession->status === 'REJECTED')
        {
            $placeToPaySession->order->update(['status' => 'REJECTED']);
        }
    }

    /**
     * Handle the PlaceToPaySession "deleted" event.
     *
     * @param  \App\Models\PlaceToPaySession  $placeToPaySession
     * @return void
     */
    public function deleted(PlaceToPaySession $placeToPaySession)
    {
        //
    }

    /**
     * Handle the PlaceToPaySession "restored" event.
     *
     * @param  \App\Models\PlaceToPaySession  $placeToPaySession
     * @return void
     */
    public function restored(PlaceToPaySession $placeToPaySession)
    {
        //
    }

    /**
     * Handle the PlaceToPaySession "force deleted" event.
     *
     * @param  \App\Models\PlaceToPaySession  $placeToPaySession
     * @return void
     */
    public function forceDeleted(PlaceToPaySession $placeToPaySession)
    {
        //
    }
}
