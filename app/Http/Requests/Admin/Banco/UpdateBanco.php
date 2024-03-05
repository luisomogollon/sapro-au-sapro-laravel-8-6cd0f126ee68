<?php

namespace App\Http\Requests\Admin\Banco;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBanco extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.banco.edit', $this->banco);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'banco_mineral' => ['nullable', Rule::unique('bancos', 'banco_mineral')->ignore($this->banco->getKey(), $this->banco->getKeyName()), 'string'],
            'banco_cuenta' => ['nullable', Rule::unique('bancos', 'banco_cuenta')->ignore($this->banco->getKey(), $this->banco->getKeyName()), 'string'],
            'banco_cantidad_disponible' => ['sometimes', 'numeric'],
            'banco_cantidad_retiros' => ['nullable', 'numeric'],
            'banco_cantidad_depositos' => ['nullable', 'numeric'],
            
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
