<?php

namespace Modules\Ordenes\Http\Requests;

use Orion\Http\Requests\Request;

class OrdenOrionRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function storeRules() : array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id'
            ,'user_id' => 'exists:users,id'
            ,'receptor_id'=> 'sometimes|required|exists:clientes,id'
            ,'orden_tipo'=> 'in:BCV,EMPRESA,PARTICULAR'
        ];
    }

    public function commonRules() : array
    {
        return [
            'receptor_id'=> 'sometimes|required|exists:clientes,id'

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
            'cliente_id.required' => 'Debe ingresar cliente.'
            ,'cliente_id.exists' => 'Cliente debe estar registrado.'
            ,'receptor_id.required' => 'Debe ingresar receptor valido'
            ,'receptor_id.exists' => 'Receptor debe estar registrado'
            ,'cliente_telf.required' => 'Debe ingresar un numero de télefono.'
            ,'cliente_telf.unique' => 'Numero de télefono ya esta tomado.'
    
        ];
    }
}
