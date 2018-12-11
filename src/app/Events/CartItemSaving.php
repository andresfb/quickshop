<?php

namespace App\Events;

use App\Cart;
use App\CartItem;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CartItemSaving
{
    use Dispatchable, SerializesModels;

    /**
     * @var CartItem
     */
    public $cartitem;

    /**
     * Create a new event instance.
     *
     * @param CartItem $cartitem
     */
    public function __construct(CartItem $cartitem)
    {
        $this->cartitem = $cartitem;
    }
}
