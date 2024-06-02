<?php

namespace App\Http\Requests\People;

use App\Http\Requests\Request;

class UpdateRequest extends Request
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
            'cpf' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'social_name' => ['nullable', 'string'],
            'mother_name' => ['nullable', 'string'],
            'father_name' => ['nullable', 'string'],
            'phone' => ['nullable', 'phone'],
            'email' => ['nullable', 'email'],
        ];
    }
}
