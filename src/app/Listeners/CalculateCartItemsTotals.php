<?php

namespace App\Listeners;

use App\Cart;
use App\Events\CartItemsSaved;

class CalculateCartItemsTotals
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
     * @param  CartItemsSaved  $event
     * @return void
     */
    public function handle(CartItemsSaved $event)
    {
        $cart_id = $event->cartItem->cart_id;

        /** @var Cart $cart */
        $cart = Cart::find($cart_id);
        if (empty($cart))
            return;

        $cart->subtotal = 0;
        foreach ($cart->cart_items as $cart_item)
            $cart->subtotal += ($cart_item->quantity * $cart_item->price);

        $cart->save();
    }
}
