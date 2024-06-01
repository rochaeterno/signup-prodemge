<?php

namespace app\Contracts\Services;

use App\Http\Requests\Request;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\Paginator;

interface PersonRepositoryInterface
{
    public function create(Request $request): Model;

    public function update(Request $request, Model $model): Model;

    public function updateAddress(Person $person, Address $address): Model;

    public function destroy(Model $model): void;

    public function list(Request $request): Paginator;
}
