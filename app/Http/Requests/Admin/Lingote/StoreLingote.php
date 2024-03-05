<?php

namespace App\Http\Requests\Admin\Lingote;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreLingote extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.lingote.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'lingote_peso' => ['nullable', 'numeric'],
            'lingote_troquelado_codigo' => ['nullable', Rule::unique('lingotes', 'lingote_troquelado_codigo'), 'string'],
            'salida_id' => ['nullable', 'integer'],
            'presentacion_id' => ['nullable', 'integer'],
            'lingote_estado_id' => ['nullable', 'integer'],
                        'user_id' => ['nullable', 'integer'],
            'lingote_descripcion' => ['nullable', 'string'],

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
