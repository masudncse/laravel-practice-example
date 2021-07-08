<?php

namespace App\Repositories;

use App\Models\Customer;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Ramsey\Collection\Collection;

//use Your Model

/**
 * Class CustomerRepository.
 */
class CustomerRepository implements CustomerRepositoryInterface
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function all()
    {
        return $this->customer->orderBy('id', 'DESC')->get();
    }
}
