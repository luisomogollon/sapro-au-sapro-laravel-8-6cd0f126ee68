<?php

namespace App\Http\Requests\Admin\Barra;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexBarra extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.barra.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:barra_codigo,barra_estado_id,barra_ley_final,barra_ley_ingreso,barra_muestra,barra_peso_banco,barra_peso_granalla,barra_peso_ingreso,barra_ultimo_peso,barra_und_masa,id,orden_id,user_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
