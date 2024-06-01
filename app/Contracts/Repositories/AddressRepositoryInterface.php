<?php

namespace app\Contracts\Services;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

interface AddressRepositoryInterface
{
    public function create(): Model;
}
