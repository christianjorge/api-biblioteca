<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=>'required',
            'ano_nasc'=>'required',
            'sexo'=>'required',
            'nacionalidade'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Defina o nome do seu autor!',
            'ano_nasc.required'  => 'É Necessário informar a data de nascimento do autor!',
            'sexo.required'  => 'É Necessário informar um sexo!',
            'nacionalidade.required'  => 'É Necessário informar a nacionalidade do autor!',
        ];
    }
}
