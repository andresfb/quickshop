<?php

namespace App\Providers;

use App\Events\CartItemSaving;
use App\Events\CartItemsSaved;
use App\Events\CartSaving;
use App\Listeners\CalculateCartItemsTotals;
use App\Listeners\CalculateCartTotals;
use App\Listeners\GetCartItemPriceDiscount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        CartItemSaving::class => [
            GetCartItemPriceDiscount::class
        ],

        CartItemsSaved::class => [
            CalculateCartItemsTotals::class
        ],

        CartSaving::class => [
            CalculateCartTotals::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
