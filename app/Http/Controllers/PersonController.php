<?php

namespace App\Http\Controllers;

use app\Contracts\Services\PersonServiceInterface;
use App\Http\Requests\People\CreateRequest;
use App\Http\Requests\People\ListRequest;
use App\Http\Requests\People\UpdateAddressRequest;
use App\Http\Requests\People\UpdateRequest;
use App\Http\Resources\People\PersonMinimalResource;
use App\Http\Resources\People\PersonResource;
use App\Models\Person;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function __construct(protected PersonServiceInterface $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ListRequest $request)
    {
        try {
            return $this->success(PersonMinimalResource::collection($this->service->list($request)));
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            /** @var Person $person */
            $person = $this->service->create($request);
            DB::commit();
            return $this->detail($person);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function detail(Person $person): JsonResponse
    {
        return $this->success(PersonResource::make($person));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(UpdateRequest $request, Person $person): JsonResponse
    {
        try {
            DB::beginTransaction();
            /** @var Person $person */
            $person = $this->service->update($request, $person);
            DB::commit();
            return $this->detail($person);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function seAddress(UpdateAddressRequest $request, Person $person): JsonResponse
    {
        try {
            DB::beginTransaction();
            /** @var Person $person */
            $person = $this->service->setAddress($request, $person);
            DB::commit();
            return $this->detail($person);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        try {
            DB::beginTransaction();
            $this->service->delete($person);
            DB::commit();
            return $this->respondOk('Person deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
