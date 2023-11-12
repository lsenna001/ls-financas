<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'old_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed']
        ];
    }

    /**
     * Define as mensagens de erro do formulário
     * @return array
     */
    public function messages(): array
    {
        return [
            'old_password.required' => 'A Senha Antiga é obrigatória',
            'old_password.current_password' => 'Senha atual incorreta',
            'new_password.required' => 'A Nova Senha é obrigatória',
            'new_password.confirmed' => 'As senhas não conferem'
        ];
    }
}
