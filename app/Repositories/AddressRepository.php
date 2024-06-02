<?php

namespace App\Repositories;

use App\Contracts\Repositories\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    public function __construct()
    {
        $this->model = Address::query();
    }
}
