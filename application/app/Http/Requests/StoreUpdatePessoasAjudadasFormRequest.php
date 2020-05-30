<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePessoasAjudadasFormRequest extends FormRequest
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
            'tx_nome'         => "required|max:100|min:15",
            'dt_nascimento'   => "required|date",
            'nu_telefone'     => "required",
//            'nu_telefone'     => "required|min:12|max:12",
        ];
    }

    public function attributes()
    {
        return [
            'tx_nome'         => "Nome",
            'dt_nascimento'   => "Data de Nascimento",
            'nu_telefone'     => "Número de telefone",
        ];
    }
}
