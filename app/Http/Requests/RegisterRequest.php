<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users|max:255', // vai ser único na tabela users
            'password' => 'required|min:6|max:60|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'Deve ter no máximo 255 caracteres',

            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ter um endereço de email válido',

            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
            'password.max' => 'A senha deve ter no mínimo 60 caracteres',
            'password.confirmed' => 'As senhas não coincidem'
        ];
    }
}
