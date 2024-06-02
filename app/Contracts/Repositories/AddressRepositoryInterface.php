<?php

namespace App\Contracts\Repositories;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

interface AddressRepositoryInterface
{
    public function create(Request $request): Model;
}
