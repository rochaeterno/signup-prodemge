<?php

namespace App\Contracts\Services;

use App\Http\Requests\Request;
use App\Models\Person;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

interface PersonServiceInterface
{
    public function create(Request $request): Model;

    public function update(Request $request, Person $person): Model;

    public function list(Request $request): Paginator;

    public function delete(Person $person): void;

    public function setAddress(Request $request, Person $person): Model;
}
