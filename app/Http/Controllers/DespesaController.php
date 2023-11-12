<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesaRequest;
use App\Models\{Despesa, Categoria};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DespesaController extends Controller
{
    /**
     * Lista as despesas do usuário
     *
     * @return View
     */
    public function index(): View
    {
        $despesas = Despesa::where('user_id', '=', auth()->user()->id)->with('categoria')->get()->toArray();

        $total = array_sum(array_column($despesas, 'valor'));

        return view('despesas/list', ['despesas' => $despesas, 'total' => $total,  'activeDespesas' => 'active']);
    }

    /**
     * Renderiza o formulário de inserção de despesas
     *
     * @return View
     */
    public function create(): View
    {
        $categorias = Categoria::all()->toArray();

        return view('despesas/form', ['categorias' => $categorias, 'activeDespesas' => 'active']);
    }

    /**
     * Recebe os dados do formulário de inserção de receitas e salva
     *
     * @param DespesaRequest $request Injeção de Dependência do Laravel
     * @return RedirectResponse
     */
    public function store(DespesaRequest $request): RedirectResponse
    {
        $validated = $request->safe()->all();

        $cat = Categoria::where('nome_categoria', 'like', '%'.$validated['categoria'].'%')->first();

        //Se a categoria não existir, inclui ela na tabela
        if(empty($cat))
            $cat = Categoria::create(['nome_categoria' => ucfirst($validated['categoria'])]);

        $validated['categoria_id'] = $cat->id_categoria;
        $validated['valor'] = str_replace(',', '.', str_replace('.', '', $validated['valor']));
        $validated['user_id'] = auth()->user()->id;

        Despesa::create($validated);

        return redirect(route('despesas.index'))->with('msg', ['type' => 'success', 'msg' => 'Despesa cadastrada!']);
    }

    /**
     * Renderiza o formulário para editar uma despesa
     *
     * @param int $id_despesa Código da Despesa
     * @return RedirectResponse|View
     */
    public function edit(int $id_despesa): RedirectResponse|View
    {
        $despesa = Despesa::where('id_despesa', '=', $id_despesa)->with('categoria')->first();

        if(empty($despesa))
            return redirect(route('despesas.index'))->with('msg', ['type' => 'danger', 'msg' => 'Despesa informada não encontrada']);

        $despesa['valor'] = number_format($despesa['valor'], 2, ',', '.');

        $categorias = Categoria::all();

        return view('despesas/form', ['despesa' => $despesa, 'categorias' => $categorias, 'activeDespesas' => 'active']);
    }

    /**
     * Recebe os dados do formulário de edição de despesa e salva
     *
     * @param int $id_despesa Código da Despesa
     * @param DespesaRequest $request Injeção de Dependência do Laravel
     * @return RedirectResponse
     */
    public function update(int $id_despesa, DespesaRequest $request): RedirectResponse
    {
        $despesa = Despesa::where('id_despesa', '=', $id_despesa)->where('user_id', '=', auth()->user()->id)->with('categoria')->first();

        if(empty($despesa))
            return redirect(route('despesas.index'))->with('msg', ['type' => 'danger', 'msg' => 'Despesa informada não encontrada']);

        $validated = $request->safe()->all();

        //Caso a categoria editada não exista, insere na tabela de categorias
        $cat = Categoria::where('nome_categoria', 'like', '%'. $validated['categoria'] .'%')->first();

        if(empty($cat))
            $cat = Categoria::create(['nome_categoria' => ucfirst($validated['categoria'])]);

        $despesa->valor = str_replace(',', '.', str_replace('.', '', $validated['valor']));
        $despesa->dia_vencimento = $validated['dia_vencimento'];
        $despesa->descricao = $validated['descricao'];
        $despesa->categoria_id = $cat->id_categoria;

        $despesa->update();

        return redirect(route('despesas.index'))->with('msg', ['type' => 'success', 'msg' => 'Despesa alterada!']);
    }

    /**
     * Remove a despesa informada
     *
     * @param int $id_despesa Código da Despesa
     * @return RedirectResponse
     */
    public function destroy(int $id_despesa): RedirectResponse
    {
        $despesa = Despesa::where('id_despesa', '=', $id_despesa)->where('user_id', '=', auth()->user()->id)->with('categoria')->first();

        if(empty($despesa))
            return redirect(route('despesas.index'))->with('msg', ['type' => 'danger', 'msg' => 'Despesa informada não encontrada']);

        $despesa->delete();

        return redirect(route('despesas.index'))->with('msg', ['type' => 'success', 'msg' => 'Despesa removida!']);
    }
}
