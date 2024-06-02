<?php

namespace App\Services;

use App\Contracts\Repositories\AddressRepositoryInterface;
use App\Contracts\Repositories\PersonRepositoryInterface;
use App\Contracts\Services\PersonServiceInterface;
use App\Http\Requests\Request;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class PersonService implements PersonServiceInterface
{
    public function __construct(
        protected PersonRepositoryInterface $repository,
        protected AddressRepositoryInterface $addressRepository
    ) {
    }

    public function create(Request $request): Model
    {
        return $this->repository->create($request);
    }

    public function update(Request $request, Person $person): Model
    {
        return $this->repository->update($request, $person);
    }

    public function list(Request $request): Paginator
    {
        return $this->repository->list($request);
    }

    public function delete(Person $person): void
    {
        $this->repository->destroy($person);
    }

    public function setAddress(Request $request, Person $person): Model
    {
        /** @var Address $address */
        $address = $this->addressRepository->create($request);
        return $this->repository->updateAddress($person, $address);
    }
}
