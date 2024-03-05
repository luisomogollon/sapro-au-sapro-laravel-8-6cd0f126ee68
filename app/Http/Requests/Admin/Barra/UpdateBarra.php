<?php

namespace App\Http\Requests\Admin\Barra;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBarra extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.barra.edit', $this->barra);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'barra_codigo' => ['sometimes', Rule::unique('barras', 'barra_codigo')->ignore($this->barra->getKey(), $this->barra->getKeyName()), 'string'],
            'barra_descripcion_operacion' => ['nullable', 'string'],
            'barra_estado_id' => ['nullable', 'integer'],
            'barra_ley_final' => ['nullable', 'numeric'],
            'barra_ley_ingreso' => ['nullable', 'numeric'],
            'barra_muestra' => ['nullable', 'numeric'],
            'barra_peso_banco' => ['nullable', 'numeric'],
            'barra_peso_granalla' => ['nullable', 'numeric'],
            'barra_peso_ingreso' => ['nullable', 'numeric'],
            'barra_ultimo_peso' => ['nullable', 'numeric'],
            'barra_und_masa' => ['nullable', 'string'],
            'orden_id' => ['nullable', 'integer'],
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
