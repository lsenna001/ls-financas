<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespesaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define as regras de validação para o formulário de despesas
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'valor' => ['required'],
            'dia_vencimento' => ['required', 'numeric'],
            'categoria' => ['required', 'string'],
            'descricao' => ['required']
        ];
    }

    /**
     * Define as mensagens de validação para o formulário de despesas
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'valor.required' => 'O campo Valor é obrigatório',
            'dia_vencimento.required' => 'O campo Dia do Vencimento é obrigatório',
            'dia_vencimento.numeric' => 'O campo Dia do Vencimento precisa ser um número',
            'categoria.required' => 'O campo Categoria é obrigatório',
            'categoria.string' => 'O campo Categoria precisa ser caracteres',
            'descricao.required' => 'O campo Descrição é obrigatório',
        ];
    }
}
