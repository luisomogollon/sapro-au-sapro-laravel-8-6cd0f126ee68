<?php

namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cliente.edit', $this->cliente);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cliente_correo' => ['nullable', Rule::unique('clientes', 'cliente_correo')->ignore($this->cliente->getKey(), $this->cliente->getKeyName()), 'string'],
            'cliente_nombre' => ['nullable', 'string'],
            'cliente_rif' => ['nullable', Rule::unique('clientes', 'cliente_rif')->ignore($this->cliente->getKey(), $this->cliente->getKeyName()), 'string'],
            'cliente_telf' => ['nullable', 'string'],
            'cliente_tipo' => ['nullable', 'string'],
            'comision_id' => ['nullable'],
            'enabled' => ['nullable', 'boolean'],
            'presentacion_id' => ['nullable'],
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
            return $this->get('presentaciones')?$this->get('presentaciones')['id']: null;
        }
        return null;
    }

    public function getComisionId(){
        if ($this->has('comisiones')){
            return $this->get('comisiones')?$this->get('comisiones')['id']:null;
        }
        return null;
    }
}
