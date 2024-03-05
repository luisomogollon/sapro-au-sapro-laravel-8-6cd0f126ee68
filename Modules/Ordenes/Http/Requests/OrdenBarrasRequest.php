<?php

namespace Modules\Ordenes\Http\Requests;

use Orion\Http\Requests\Request;
use Modules\Barra\Entities\Barra;

class OrdenBarrasRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function storeRules() : array
    {
        return [
           
        ];
    }

    public function updateRules () : array 
    {
        $barra = Barra::findOrFail($this->barra??1);
 
        return [
           'barra_muestra' => 'sometimes|required|numeric|between:0.1,'. $barra->viruta->viruta_muestra
            ,'barra_muestra_procesada' => 'sometimes|required|numeric|between:0.1,'. $barra->barra_muestra
            ,'barra_ley_ingreso' => 'sometimes|required|numeric|between:1,999.999'
            ,'barra_ley_final' =>'sometimes|required|numeric|between:1,999.999'
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
            'barra_muestra.required' => 'Debe ingresar viruta.'
            ,'barra_muestra.numeric' => 'Viruta debe ser numerico.'
            ,'barra_muestra.between' => 'Viruta debe ser un numero valido'
            ,'barra_muestra_procesada.required' => 'Debe ingresar viruta.'
            ,'barra_muestra_procesada.numeric' => 'Viruta debe ser numerico.'
            ,'barra_muestra_procesada.between' => 'Viruta debe ser un numero valido'
    
        ];
    }
} 

