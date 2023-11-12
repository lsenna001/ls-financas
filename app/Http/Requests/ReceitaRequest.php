<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define as regras de validação para o formulário de receitas
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'empresa' => ['required', 'string', 'max:200'],
            'valor' => ['required']
        ];
    }

    /**
     * Define as mensagens de validação das Receitas
     * @return array
     */
    public function messages(): array
    {
        return [
            'empresa.required' => 'O campo Empresa é obrigatório',
            'valor.required' => 'O campo Valor é obrigatório',
            'empresa.string' => 'O campo Empresa precisa conter carateres',
            'empresa.max' => 'O campo Empresa pode conter até 200 caracteres'
        ];
    }
}
