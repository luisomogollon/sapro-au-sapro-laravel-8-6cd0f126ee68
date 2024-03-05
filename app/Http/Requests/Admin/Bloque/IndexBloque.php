<?php

namespace App\Http\Requests\Admin\Bloque;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexBloque extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.bloque.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:bloque_estado_id,bloque_oro_cargado,bloque_oro_granalla,bloque_oro_ley,bloque_oro_ley_real,bloque_oro_resultado,bloque_otros_cargado,bloque_otros_resultado,bloque_peso,bloque_plata_cargado,bloque_plata_resultado,id,user_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
