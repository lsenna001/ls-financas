<?php

namespace App\Http\Controllers;

use App\Models\{Despesa, Categoria};
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DespesaController extends Controller
{
    /**
     * Lista as despesas do usuário
     */
    public function index(): View
    {
        $userId = auth()->user()->id;
        $despesas = Despesa::where('user_id', '=', $userId)->with('categoria')->get()->toArray();
        $total = array_sum(array_column($despesas, 'valor'));
        return view('despesas/list', ['despesas' => $despesas, 'total' => $total,  'activeDespesas' => 'active']);
    }

    /**
     * Renderiza o formulário de inserção de despesas
     */
    public function create(): View
    {
        $categorias = Categoria::all()->toArray();
        return view('despesas/form', ['categorias' => $categorias, 'activeDespesas' => 'active']);
    }

    /**
     * Recebe os dados do formulário de inserção de receitas e salva
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'valor' => 'required',
            'dia_vencimento' => 'required|numeric',
            'categoria_id' => 'required|numeric',
            'descricao' => 'required'
        ]);

        $validated['valor'] = str_replace('.', '', $validated['valor']);
        $validated['valor'] = str_replace(',', '.', $validated['valor']);

        $validated['user_id'] = auth()->user()->id;

        $despesa = new Despesa($validated);

        $despesa->save();

        return redirect(route('despesas.index'))->with('msg', ['type' => 'success', 'msg' => 'Despesa cadastrada!']);
    }

    /**
     * Renderiza o formulário para editar uma despesa
     */
    public function edit($id): View
    {
        $despesa = Despesa::where('id_despesa', '=', $id)->with('categoria')->first()->toArray();
        $despesa['valor'] = number_format($despesa['valor'], 2, ',', '.');

        $categorias = Categoria::all();

        return view('despesas/form', ['despesa' => $despesa, 'categorias' => $categorias, 'activeDespesas' => 'active']);
    }

    /**
     * Recebe os dados do formulário de edição de despesa e salva
     */
    public function update($id, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'valor' => 'required',
            'dia_vencimento' => 'required|numeric',
            'categoria_id' => 'required|numeric',
            'descricao' => 'required'
        ]);

        $validated['valor'] = str_replace('.', '', $validated['valor']);
        $validated['valor'] = str_replace(',', '.', $validated['valor']);
        $validated['user_id'] = auth()->user()->id;

        $despesa = Despesa::findOrFail($id);
        $despesa->valor = $validated['valor'];
        $despesa->dia_vencimento = $validated['dia_vencimento'];
        $despesa->categoria_id = $validated['categoria_id'];
        $despesa->descricao = $validated['descricao'];
        $despesa->user_id = $validated['user_id'];

        $despesa->update();

        return redirect(route('despesas.index'))->with('msg', ['type' => 'success', 'msg' => 'Despesa alterada!']);
    }

    /**
     * Remove a despesa informada
     */
    public function destroy($id): RedirectResponse
    {
        $despesa = Despesa::findOrFail($id);
        
        $despesa->delete();

        return redirect(route('despesas.index'))->with('msg', ['type' => 'success', 'msg' => 'Despesa removida!']);
    }
}
