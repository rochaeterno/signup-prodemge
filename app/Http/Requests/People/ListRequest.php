<?php

namespace App\Http\Requests\People;

use App\Http\Requests\Request;

class ListRequest extends Request
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
            'id' => ['nullable', 'integer'],
            'cpf' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'current_page' => ['nullable', 'integer', 'min:1',],
            'order' => ['nullable', 'in:ASC,asc,DESC,desc',],
            'order_by' => ['nullable', 'in:created_at',],
            'per_page' => ['nullable', 'min:1', 'integer',],
        ];
    }
}
