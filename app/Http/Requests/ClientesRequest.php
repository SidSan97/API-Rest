<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\ValidaCpf;

class ClientesRequest extends FormRequest
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
            'nome'  => 'required',
            'tel'   => 'required',
            'cpf'   => ['required', new ValidaCpf],
            'placa' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'nome.required'  => 'O campo nome é obrigatório',
            'tel.required'   => 'O campo tel é obrigatório',
            'cpf.required'   => 'O campo cpf é obrigatório',
            'placa.required' => 'O campo placa é obrigatório',
        ];
    }
}
