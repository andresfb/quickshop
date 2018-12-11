<?php

namespace App\Events;

use App\Cart;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CartSaving
{
    use Dispatchable, SerializesModels;

    /**
     * @var Cart
     */
    public $cart;

    /**
     * Create a new event instance.
     *
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
}
