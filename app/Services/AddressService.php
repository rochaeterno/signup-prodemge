<?php

namespace App\Services;

use app\Contracts\Services\AddressRepositoryInterface;
use app\Contracts\Services\AddressServiceInterface;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class AddressService implements AddressServiceInterface
{
    public Request $request;

    public function __construct(protected AddressRepositoryInterface $repository)
    {
    }

    public function create(Request $request): Model
    {
        return $this->repository->create($request);
    }
}
