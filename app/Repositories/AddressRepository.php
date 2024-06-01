<?php

namespace App\Repositories;

use app\Contracts\Services\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    public function __construct()
    {
        $this->model = Address::query();
    }
}
