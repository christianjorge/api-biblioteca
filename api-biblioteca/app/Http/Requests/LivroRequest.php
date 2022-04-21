<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'titulo'=>'required',
            'ano'=>'required',
            'id_autor'=>'required',
            'id_genero'=>'required',
            'id_editora'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Coloque um titulo no livro',
            'ano.required'  => 'É Necessário informar o ano de lançamento do livro!',
            'id_autor.required'  => 'É Necessário informar um autor!',
            'id_genero.required'  => 'É Necessário informar um genero!',
            'id_editora.required'  => 'É Necessário informar uma editora!',
        ];
    }
}
