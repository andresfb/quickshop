<?php

namespace App\Listeners;

use App\Events\CartSaving;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CalculateCartTotals
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CartSaving  $event
     * @return void
     */
    public function handle(CartSaving $event)
    {
        // TODO: Create a State Model and table with a tax rate for each state
        // TODO: Add a state field to the Cart table
        // $event->cart->tax = State::getTax($event->cart->state, $event->cart->subtotal);

        $taxrate = rand(0, 8) / 100;
        $event->cart->tax = $event->cart->subtotal * $taxrate;
        $event->cart->total = ($event->cart->subtotal +
                $event->cart->tax + $event->cart->shipping) -
            $event->cart->discount;
    }
}
