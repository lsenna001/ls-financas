<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceitaRequest;
use Illuminate\View\View;
use App\Models\Receita;
use Illuminate\Http\RedirectResponse;

class ReceitaController extends Controller
{
    /**
     * Listagem da receita do usuário
     *
     * @return View
     */
    public function index() : View
    {
        $receitas = Receita::getReceitas(auth()->user()->id);

        $total = array_sum(array_column($receitas, 'valor'));

        return view('receitas/list', ['receitas' => $receitas, 'total' => $total, 'activeReceitas' => 'active']);
    }

    /**
     * Formulário de inserção de receitas
     *
     * @return View
     */
    public function create() : View
    {
        return view('receitas/form');
    }

    /**
     * Processa os dados do formulário de inserção de receita
     *
     * @param ReceitaRequest $request Injeção de Dependência do Laravel
     * @return RedirectResponse
     */
    public function store(ReceitaRequest $request) : RedirectResponse
    {
        $validated = $request->safe()->all();

        $validated['valor'] = str_replace(',', '.', str_replace('.', '', $validated['valor']));
        $validated['user_id'] = auth()->user()->id;

        Receita::create($validated);

        return redirect(route('receitas.index'))->with('msg', ['type' => 'success', 'msg' => 'Receita inserida com sucesso!']);
    }

    /**
     * Carrega o formulário para edição da receita
     *
     * @param int $id_receita Código da Receita
     * @return View|RedirectResponse
     */
    public function edit(int $id_receita): View|RedirectResponse
    {
        $receita = Receita::where('id_receita', '=', $id_receita)->where('user_id', '=', auth()->user()->id)->first();

        if(empty($receita))
            return redirect(route('receitas.index'))->with('msg', ['type' => 'danger', 'msg' => 'Receita informada não encontrada']);

        $receita['valor'] = number_format($receita['valor'], 2, ',', '.');

        return view('receitas.form', ['receita' => $receita, 'activeReceitas' => 'active']);
    }

    /**
     * Recebe os dados do formulário de edição de receitas e salva
     *
     * @param int $id_receita Código da Receita
     * @param ReceitaRequest $request Injeção de Dependência do Laravel
     * @return RedirectResponse
     */
    public function update(int $id_receita, ReceitaRequest $request): RedirectResponse
    {
        $receita = Receita::where('id_receita', '=', $id_receita)->where('user_id', '=', auth()->user()->id)->first();

        if(empty($receita))
            return redirect(route('receitas.index'))->with('msg', ['type' => 'danger', 'msg' => 'Receita informada não encontrada']);

        $validated = $request->safe()->all();

        $receita->empresa = $validated['empresa'];
        $receita->valor = str_replace(',', '.', str_replace('.', '', $validated['valor']));

        $receita->update();

        return redirect(route('receitas.index'))->with('msg',['type' => 'success', 'msg' => 'Receita atualizada!']);
    }

    /**
     * Remove a receita informada
     *
     * @param int $id_receita Código da Receita
     * @return RedirectResponse
     */
    public function destroy(int $id_receita): RedirectResponse
    {
        $receita = Receita::where('id_receita', '=', $id_receita)->where('user_id', '=', auth()->user()->id)->first();

        if(empty($receita))
            return redirect(route('receitas.index'))->with('msg', ['type' => 'danger', 'msg' => 'Receita informada não encontrada']);

        $receita->delete();

        return redirect(route('receitas.index'))->with('msg', ['type' => 'success', 'msg' => 'Receita removida.']);
    }
}
