<?php

namespace App\Http\Requests\Admin\Metale;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMetale extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.metale.create');
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
            'metal_codigo' => ['nullable', Rule::unique('metales', 'metal_codigo'), 'string'],
            'metal_descripcion' => ['nullable', 'string'],
            'metal_nombre' => ['nullable', Rule::unique('metales', 'metal_nombre'), 'string'],
            'metal_simbolo' => ['nullable', Rule::unique('metales', 'metal_simbolo'), 'string'],
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
