<?php

namespace App\Http\Requests\People;

use App\Http\Requests\Request;

class UpdateAddressRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'street' => ['required', 'string'],
            'uf' => ['required', 'string', 'max:2'],
            'number' => ['nullable', 'integer'],
            'city' => ['required', 'string'],
            'neighborhood' => ['required', 'string'],
            'complement' => ['nullable', 'string'],
        ];
    }
}
