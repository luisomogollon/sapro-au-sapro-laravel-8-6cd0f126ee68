<?php

namespace App\Http\Requests\Admin\Metale;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMetale extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.metale.edit', $this->metale);
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
            'metal_codigo' => ['sometimes', Rule::unique('metales', 'metal_codigo')->ignore($this->metale->getKey(), $this->metale->getKeyName()), 'string'],
            'metal_descripcion' => ['nullable', 'string'],
            'metal_nombre' => ['nullable', Rule::unique('metales', 'metal_nombre')->ignore($this->metale->getKey(), $this->metale->getKeyName()), 'string'],
            'metal_simbolo' => ['nullable', Rule::unique('metales', 'metal_simbolo')->ignore($this->metale->getKey(), $this->metale->getKeyName()), 'string'],
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
