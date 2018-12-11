<?php

namespace App;

use App\Events\CartItemSaving;
use App\Events\CartItemsSaved;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'saving'    => CartItemSaving::class,
        'saved'     => CartItemsSaved::class,
        'deleted'   => CartItemsSaved::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
