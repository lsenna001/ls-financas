<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GastoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define as regras de validação para o formulário de gastos.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'descricao' => ['required'],
            'data' => ['required'],
            'valor' => ['required'],
            'categoria' => ['required']
        ];
    }

    /**
     * Define as mensagens de validação para o formulário de gastos.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'descricao.required' => 'O campo Descrição é obrigatório',
            'data.required' => 'O campo Data é obrigatório',
            'valor.required' => 'O campo Valor é obrigatório',
            'categoria.required' => 'O campo Categoria é obrigatório',
        ];
    }
}
