<?php

namespace App\Http\Requests\People;

use App\Http\Requests\Request;

class CreateRequest extends Request
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
            'cpf' => ['required', 'string', 'min:11', 'max:11'],
            'name' => ['required', 'string'],
            'social_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'phone' => ['required', 'min:11', 'max:11'],
            'email' => ['required', 'email'],
        ];
    }
}
