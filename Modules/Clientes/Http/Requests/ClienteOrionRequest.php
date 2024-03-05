<?php

namespace Modules\Clientes\Http\Requests;

use Orion\Http\Requests\Request;

class ClienteOrionRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function storeRules() : array
    {
        return [
            'cliente_rif' => 'required|unique:clientes'
            ,'cliente_correo'=> 'unique:clientes'
            ,'cliente_nombre'=> 'required'
            ,'cliente_telf' => 'required|unique:clientes'
            ,'user_id' => 'exists:users,id'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
{
    return [
        'cliente_rif.required' => 'Debe ingresar rif'
        ,'cliente_rif.unique' => 'Este rif ya esta tomado'
        ,'cliente_telf.required' => 'Debe ingresar un numero de télefono'
        ,'cliente_telf.unique' => 'Numero de télefono ya esta tomado'

    ];
}
}
