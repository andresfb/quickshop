<?php

namespace App;

use App\Events\CartSaving;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * @package App
 */
class Cart extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'saving' => CartSaving::class
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * @param int $cartid
     * @return Cart
     */
    public static function findPending(int $cartid)
    {
        return self::where('id', $cartid)->where('status', 'N')->first();
    }

    /**
     * @param int $cartid
     * @return Cart
     */
    public static function findPendingOrNew(int $cartid)
    {
        $cart = self::where('id', $cartid)->where('status', 'N')->first();
        if (empty($cart))
            $cart = self::create(['status' => 'N']);

        return $cart;
    }
}
