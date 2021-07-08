<?php


namespace App\Services\Cart;


use Carbon\Carbon;

class CartService implements CartServiceInterface
{
    private $items = [];

    private $date;

    public $via;

    public function __construct($date, $via)
    {
        $this->date = $date;
        $this->via = $via;
    }

    public function insert($data = [])
    {
        array_push($this->items, $data);
    }

    public function count()
    {
        return count($this->items);
    }

    public function contents()
    {
        return $this->items;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDateHumanReadable()
    {
        return Carbon::parse($this->date)->format('d m, Y');
    }
}
