<?php

namespace App\Providers;

use App\Services\Cart;
use App\Services\Cart\CartServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $cartServiceInstance = new Cart\CartService(Carbon::now()->toDateTimeString(), 'CartService');

        $this->app->instance(Cart\CartService::class, $cartServiceInstance);

        $this->app->bind(CartServiceInterface::class, function (){
            return new Cart\CartService(Carbon::now()->toDateTimeString(), 'CartServiceInterface');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
