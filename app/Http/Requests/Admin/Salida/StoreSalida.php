<?php

namespace App\Http\Requests\Admin\Salida;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSalida extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.salida.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
           // 'salida_referencia' => ['nullable', Rule::unique('salidas', 'salida_referencia'), 'string'],
            'activated' => ['nullable', 'boolean'],
            'salida_descripcion' => ['nullable', 'string'],
            'colector_id' => ['nullable'],
            'salida_estado_id' => ['nullable', 'numeric'],
            'user_id' => ['nullable', 'numeric'],
            'lingotes'=> ['required'],
            
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

    public function getLingotes(){
        if ($this->has('lingotes')){
            $data=[];
            foreach ($this->get('lingotes') as $key => $value) {
                $data[]= $value['id'];
            }
            return $data;
        }
        return null;
    }

    public function  getColectorId(){
        if ($this->has('colectores')){
            return $this->get('colectores')['id'];
        }
        return null;
    }
}
