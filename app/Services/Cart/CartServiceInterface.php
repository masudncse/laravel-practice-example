<?php


namespace App\Services\Cart;

interface CartServiceInterface
{
    public function insert();

    public function contents();

    public function count();

    public function getDate();

    public function getDateHumanReadable();
}
