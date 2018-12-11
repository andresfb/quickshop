<?php

namespace App\Events;

use App\CartItem;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CartItemsSaved
{
    use Dispatchable, SerializesModels;

    public $cartItem;

    /**
     * Create a new event instance.
     *
     * @param CartItem $cartItem
     */
    public function __construct(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
    }
}
