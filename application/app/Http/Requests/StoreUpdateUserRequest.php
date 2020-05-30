<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserRequest extends FormRequest
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
            'password'      => 'required|required_with:password_confirmation|string|confirmed',
            'tx_nome'       => "required|max:100|min:15",
            'dt_nascimento' => "required|date",
            'nu_telefone'   => "required",
            'email'         => "required|email",
        ];
    }
}
