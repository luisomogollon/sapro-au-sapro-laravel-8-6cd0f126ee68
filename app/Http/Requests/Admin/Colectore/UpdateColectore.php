<?php

namespace App\Http\Requests\Admin\Colectore;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateColectore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.colectore.edit', $this->colectore);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'colector_nombres' => ['nullable', 'string'],
            'colector_apellidos' => ['nullable', 'string'],
            'colector_cedula' => ['nullable', 'string'],
            'cedulas'=>['required']                                 
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

    public function getClienteId(){
        if ($this->has('cliente')){
            return $this->get('cliente')['id'];
        }
        return null;
    }
}
