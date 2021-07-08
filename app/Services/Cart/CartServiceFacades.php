<?php


namespace App\Services\Cart;


use Illuminate\Support\Facades\Facade;

class CartServiceFacades extends Facade
{
    public static function getFacadeAccessor()
    {
        return CartService::class;
    }
}
