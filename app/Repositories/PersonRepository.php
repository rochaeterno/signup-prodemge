<?php

namespace App\Repositories;

use App\Contracts\Repositories\PersonRepositoryInterface;
use App\Http\Requests\Request;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class PersonRepository extends BaseRepository implements PersonRepositoryInterface
{
    public function __construct()
    {
        $this->model = Person::query();
    }

    public function list(Request $request): Paginator
    {
        $this->request = $request;
        $id = $request->input('id');
        $cpf = $request->input('cpf');
        $name = $request->input('name');

        $this->query = $this->model
            ->when($id, fn(Builder $query) => $query->where('id', $id))
            ->when($name, fn(Builder $query) => $query->where('name', 'LIKE', "%{$name}%"))
            ->when($cpf, fn(Builder $query) => $query->where('cpf', $cpf));
        return $this->setOrder()->setPaginate();
    }

    public function updateAddress(Person $person, Address $address): Model
    {
        $person->addresses()
            ->where('type', $address->type)
            ->updateExistingPivot(
                'person_id', $person->id,
                ['_is_active' => false]
            );
        $person->addresses()->attach($address->id);
        return $person;
    }
}
