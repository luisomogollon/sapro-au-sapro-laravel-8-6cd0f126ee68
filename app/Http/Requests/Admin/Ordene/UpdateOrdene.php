<?php

namespace App\Http\Requests\Admin\Ordene;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateOrdene extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.ordene.edit', $this->ordene);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orden_referencia' => ['nullable', Rule::unique('ordenes', 'orden_referencia')->ignore($this->ordene->getKey(), $this->ordene->getKeyName()), 'string'],
            'orden_descripcion' => ['nullable', 'string'],
            'cliente_id' => ['nullable', 'integer'],
            'orden_estado_id' => ['nullable', 'integer'],
            'orden_tipo' => ['nullable', 'string'],
            'comision_id' => ['nullable', 'integer'],

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
