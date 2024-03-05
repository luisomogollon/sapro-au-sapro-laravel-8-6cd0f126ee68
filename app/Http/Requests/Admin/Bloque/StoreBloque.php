<?php

namespace App\Http\Requests\Admin\Bloque;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreBloque extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.bloque.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'bloque_estado_id' => ['nullable', 'string'],
            'bloque_oro_cargado' => ['nullable', 'numeric'],
            'bloque_oro_granalla' => ['nullable', 'numeric'],
            'bloque_oro_ley' => ['nullable', 'numeric'],
            'bloque_oro_ley_real' => ['nullable', 'numeric'],
            'bloque_oro_resultado' => ['nullable', 'numeric'],
            'bloque_otros_cargado' => ['nullable', 'numeric'],
            'bloque_otros_resultado' => ['nullable', 'numeric'],
            'bloque_peso' => ['required', 'numeric'],
            'bloque_plata_cargado' => ['nullable', 'numeric'],
            'bloque_plata_resultado' => ['nullable', 'numeric'],
            'user_id' => ['nullable', 'string'],
            
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
