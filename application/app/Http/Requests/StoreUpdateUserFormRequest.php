<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
        if (!$this->isMethod('PUT')) {
            $estaEditando['chave'] = 'password';
            $estaEditando['valor'] = 'required|required_with:password_confirmation|string|confirmed';
        } else {
            $estaEditando = array('chave' => '', 'valor' => '');
        }

        return [
            'tx_nome'       => "required|max:100",
//            'dt_nascimento' => "required|date",
            'nu_telefone'   => "required",
            'email'         => "required|email",
            "{$estaEditando['chave']}" => "{$estaEditando['valor']}",
        ];
    }
}
