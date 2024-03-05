<?php

namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cliente.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cliente_correo' => ['nullable', Rule::unique('clientes', 'cliente_correo'), 'string'],
            'cliente_nombre' => ['nullable', 'string'],
            'cliente_rif' => ['nullable', Rule::unique('clientes', 'cliente_rif'), 'string'],
            'cliente_telf' => ['nullable', 'string'],
            'cliente_tipo' => ['nullable', 'string'],
            'comision_id' => ['nullable', 'integer'],
            'enabled' => ['nullable', 'boolean'],
            'presentacion_id' => ['nullable', 'integer'],
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

    public function getPresentacionId(){
        if ($this->has('presentaciones')){
            return $this->get('presentaciones')['id'];
        }
        return null;
    }

    public function getComisionId(){
        if ($this->has('comisiones')){
            return $this->get('comisiones')['id'];
        }
        return null;
    }
}
