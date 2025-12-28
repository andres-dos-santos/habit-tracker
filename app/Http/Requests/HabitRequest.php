<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HabitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo é obrigatório',
            'name.max' => 'Deve ter no máximo 255 caracteres',
            'name.string' => 'Deve ser texto',
        ];
    }
}
