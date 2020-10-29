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
            "lider_id"        => "required",
            "tx_nome"         => "required|max:100|min:15",
            "dt_nascimento"   => "required|date",
            "nu_telefone"     => "required",
        ];
    }

    public function messages()
    {
        return [
            'lider_id.required' => "O campo Líder é obrigatório",
        ];
    }
}
