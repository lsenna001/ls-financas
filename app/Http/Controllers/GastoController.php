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
     * @return View
     */
    public function index(): View
    {
        $gastos = Gasto::getGastos(auth()->user()->id);

        $total = array_sum(array_column($gastos, 'valor'));

        return view('gastos.list', ['gastos' => $gastos, 'total' => $total, 'activeGastos' => 'active']);
    }

    /**
     * Carrega o formulário de inserção de gastos
     * @return View
     */
    public function create(): View
    {
        $categorias = Categoria::all();
        return view('gastos.form', ['categorias' => $categorias, 'activeGastos' => 'active']);
    }

    /**
     * Recebe os dados do formulário de novos gastos e salva
     * @param GastoStoreRequest $request Validação
     * @return RedirectResponse
     */
    public function store(GastoStoreRequest $request): RedirectResponse
    {
        $validated = $request->safe()->all();

        $gasto = new Gasto($validated);
        $gasto->user_id = auth()->user()->id;

        $gasto->save();

        return redirect(route('gastos.index'))->with('msg', ['type' => 'success', 'msg' => 'Gasto inserido com sucesso!']);
    }

    /**
     * Carrega o formulário para editar um gasto
     * @param int $gasto_id Id do Gasto
     * @return View|RedirectResponse
     */
    public function edit(int $gasto_id): View|RedirectResponse
    {
        $gasto = Gasto::where('id_gasto', '=', $gasto_id)->first();

        if(empty($gasto) or $gasto->user_id !== auth()->user()->id)
            return redirect(route('gastos.index'))->with('msg', ['type' => 'danger', 'msg' => 'Gasto não encontrado']);

        $categorias = Categoria::all();
        return view('gastos.form', ['gasto' => $gasto, 'categorias' => $categorias, 'activeGastos' => 'active']);

    }

    /**
     * Recebe os dados do formulário de edição do gasto e altera
     * @param int $gasto_id Id do Gasto
     * @param GastoStoreRequest $request Validação do Formulário
     * @return RedirectResponse
     */
    public function update(int $gasto_id, GastoStoreRequest $request): RedirectResponse
    {
        $gasto = Gasto::where('id_gasto', '=', $gasto_id)->first();

        if(empty($gasto) or $gasto->user_id !== auth()->user()->id)
            return redirect(route('gastos.index'))->with('msg', ['type' => 'danger', 'msg' => 'Gasto não encontrado']);

        $validated = $request->safe()->all();

        $gasto->descricao = $validated['descricao'];
        $gasto->valor = $validated['valor'];
        $gasto->categoria_id = $validated['categoria_id'];
        $gasto->data = $validated['data'];
        $gasto->update();

        return redirect(route('gastos.index'))->with('msg', ['type' => 'success', 'msg' => 'Gasto alterado']);
    }


    public function destroy(int $gasto_id): RedirectResponse
    {
        $gasto = Gasto::where('id_gasto', '=', $gasto_id)->first();

        if(empty($gasto) or $gasto->user_id !== auth()->user()->id)
            return redirect(route('gastos.index'))->with('msg', ['type' => 'danger', 'msg' => 'Gasto não encontrado']);

        $gasto->delete();

        return redirect(route('gastos.index'))->with('msg', ['type' => 'success', 'msg' => 'Gasto removido']);
    }
}
