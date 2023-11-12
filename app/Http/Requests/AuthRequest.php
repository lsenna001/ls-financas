<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }

    /**
     * Define as mensagens de validação que serão mostradas para o usuário
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => 'O Email é obrigatório',
            'email.email' => 'O Email não é válido',
            'password.required' => 'A senha é obrigatória',
            'password.string' => 'A senha precisa conter caracteres'
        ];
    }

    /**
     * Valida o login do usuário checando se está registrado no banco
     * @return void
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        if(! Auth::attempt($this->only('email', 'password'))){
            throw ValidationException::withMessages([
                'email' => 'Usuário ou senha incorretos',
                'password' => 'Usuário ou senha incorretos'
            ]);
        }
    }
}
