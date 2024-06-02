<?php

namespace App\Http\Resources\People;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Person;

class PersonMinimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Person $this */
        return [
            'name' => $this->name,
            'social_name' => $this->social_name,
            'email' => $this->email,
            'cpf' => $this->cpf,
        ];
    }
}
