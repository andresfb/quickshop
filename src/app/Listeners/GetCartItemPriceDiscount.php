<?php

namespace App\Listeners;

use App\Discount;
use App\Events\CartItemSaving;

class GetCartItemPriceDiscount
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
     * @param  CartItemSaving  $event
     * @return void
     */
    public function handle(CartItemSaving $event)
    {
        $qtty = $event->cartitem->quantity;
        if (empty($qtty))
            return;

        $prodprice = $event->cartitem->product->price;

        $event->cartitem->price = $prodprice;

        $discount = Discount::where('min_quantity', '<=', $qtty)
            ->orderBy('min_quantity', 'DESC')->first();

        if (empty($discount))
            return;

        $event->cartitem->price = $prodprice - ($prodprice * $discount->discount);
    }
}
