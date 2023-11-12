<?php

namespace App\Http\Controllers;

use App\Http\Requests\GastoStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\{Gasto, Categoria};

class GastoController extends Controller
{
    /**
     * Carrega a lista com todos os gastos do usuário
     *
     * @return View
     */
    public function index(): View
    {
        $gastos = Gasto::where('user_id', '=', auth()->user()->id)->with('categoria')->get()->toArray();

        $total = array_sum(array_column($gastos, 'valor'));

        return view('gastos.list', ['gastos' => $gastos, 'total' => $total, 'activeGastos' => 'active']);
    }

    /**
     * Carrega o formulário de inserção de gastos
     *
     * @return View
     */
    public function create(): View
    {
        $categorias = Categoria::all();

        return view('gastos.form', ['categorias' => $categorias, 'activeGastos' => 'active']);
    }

    /**
     * Recebe os dados do formulário de novos gastos e salva
     *
     * @param GastoStoreRequest $request Validação
     * @return RedirectResponse
     */
    public function store(GastoStoreRequest $request): RedirectResponse
    {
        $validated = $request->safe()->all();

        $cat = Categoria::where('nome_categoria', 'like', '%'. $validated['categoria'] .'%')->first();

        if(empty($cat))
            $cat = Categoria::create(['nome_categoria' => ucfirst($validated['categoria'])]);

        $validated['categoria_id'] = $cat->id_categoria;
        $validated['valor'] = str_replace(',', '.', str_replace('.', '', $validated['valor']));
        $validated['user_id'] = auth()->user()->id;

        Gasto::create($validated);

        return redirect(route('gastos.index'))->with('msg', ['type' => 'success', 'msg' => 'Gasto inserido com sucesso!']);
    }

    /**
     * Carrega o formulário para editar um gasto
     *
     * @param int $id_gasto Código do Gasto
     * @return View|RedirectResponse
     */
    public function edit(int $id_gasto): View|RedirectResponse
    {
        $gasto = Gasto::where('id_gasto', '=', $id_gasto)->where('user_id', '=', auth()->user()->id)->first();

        if(empty($gasto))
            return redirect(route('gastos.index'))->with('msg', ['type' => 'danger', 'msg' => 'Gasto não encontrado']);

        $gasto->valor = number_format($gasto->valor, 2, ',', '.');

        $categorias = Categoria::all();

        return view('gastos.form', ['gasto' => $gasto, 'categorias' => $categorias, 'activeGastos' => 'active']);

    }

    /**
     * Recebe os dados do formulário de edição do gasto e altera
     *
     * @param int $id_gasto Id do Gasto
     * @param GastoStoreRequest $request Injeção de Dependência do Laravel
     * @return RedirectResponse
     */
    public function update(int $id_gasto, GastoStoreRequest $request): RedirectResponse
    {
        $gasto = Gasto::where('id_gasto', '=', $id_gasto)->where('user_id', '=', auth()->user()->id)->with('categoria')->first();

        if(empty($gasto))
            return redirect(route('gastos.index'))->with('msg', ['type' => 'danger', 'msg' => 'Gasto não encontrado']);

        $validated = $request->safe()->all();

        //Caso a categoria editada não exista, insere na tabela de categorias
        $cat = Categoria::where('nome_categoria', 'like', '%'. $validated['categoria'] .'%')->first();

        if(empty($cat))
            $cat = Categoria::create(['nome_categoria' => ucfirst($validated['categoria'])]);

        $gasto->descricao = $validated['descricao'];
        $gasto->valor = str_replace(',', '.', str_replace('.', '', $validated['valor']));
        $gasto->data = $validated['data'];
        $gasto->categoria_id = $cat->id_categoria;

        $gasto->update();

        return redirect(route('gastos.index'))->with('msg', ['type' => 'success', 'msg' => 'Gasto alterado']);
    }

    /**
     * Remove o gasto informado
     *
     * @param int $gasto_id Código do Gasto
     * @return RedirectResponse
     */
    public function destroy(int $id_gasto): RedirectResponse
    {
        $gasto = Gasto::where('id_gasto', '=', $id_gasto)->where('user_id', '=', auth()->user()->id)->first();

        if(empty($gasto))
            return redirect(route('gastos.index'))->with('msg', ['type' => 'danger', 'msg' => 'Gasto não encontrado']);

        $gasto->delete();

        return redirect(route('gastos.index'))->with('msg', ['type' => 'success', 'msg' => 'Gasto removido']);
    }
}
