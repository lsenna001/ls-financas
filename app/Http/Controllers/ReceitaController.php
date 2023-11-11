<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Receita;
use Illuminate\Http\RedirectResponse;

class ReceitaController extends Controller
{
    /**
     * Listagem da receita do usuário
     */
    public function index() : View
    {
        $receitas = Receita::getReceitas(auth()->user()->id);

        $total = array_sum(array_column($receitas, 'valor'));

        return view('receitas/list', ['receitas' => $receitas, 'total' => $total, 'activeReceitas' => 'active']);
    }

    /**
     * Formulário de inserção de receitas
     */
    public function create() : View
    {
        return view('receitas/form');
    }

    /**
     * Processa os dados do formulário de inserção de receita
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'empresa' => 'required',
            'valor' => 'required'
        ]);

        $validated['valor'] = str_replace('.', '', $validated['valor']);
        $validated['valor'] = str_replace(',', '.', $validated['valor']);
        $validated['user_id'] = auth()->user()->id;

        $receita = new Receita($validated);

        $receita->save();

        return redirect(route('receitas.index'))->with('msg', ['type' => 'success', 'msg' => 'Receita inserida com sucesso!']);
    }

    /**
     * Carrega o formulário para edição da receita
     */
    public function edit($id): View
    {
        $receita = Receita::findOrFail($id);
        $receita['valor'] = number_format($receita['valor'], 2, ',', '.');

        return view('receitas/form', ['receita' => $receita, 'activeReceitas' => 'active']);
    }

    /**
     * Recebe os dados do formulário de edição de receitas e salva
     */
    public function update($id, Request $request): RedirectResponse
    {
        $receita = Receita::findOrFail($id);

        $receita->empresa = $request->input('empresa');
        $valor = str_replace('.', '', $request->valor);
        $valor = str_replace(',', '.', $valor);
        $receita->valor = $valor;

        $receita->update();

        return redirect(route('receitas.index'))->with('msg',['type' => 'success', 'msg' => 'Receita atualizada!']);
    }

    /**
     * Remove a receita informada
     */
    public function destroy($id): RedirectResponse
    {
        $receita = Receita::findOrFail($id);

        $receita->delete();
        return redirect(route('receitas.index'))->with('msg', ['type' => 'success', 'msg' => 'Receita removida.']);
    }
}
