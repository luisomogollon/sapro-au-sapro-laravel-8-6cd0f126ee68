<?php

namespace App\Http\Requests\Admin\Movimiento;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMovimiento extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.movimiento.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'activated' => ['nullable', 'boolean'],
            'banco_id' => ['nullable', 'integer'],
            'barra_id' => ['nullable', 'integer'],
            'movimiento_cifra' => ['nullable', 'numeric'],
            'movimiento_codigo' => ['nullable', Rule::unique('movimientos', 'movimiento_codigo'), 'string'],
            'movimiento_tipo' => ['required', 'string'],
            'user_id' => ['nullable', 'integer'],

        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
