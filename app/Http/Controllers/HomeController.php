<?php

namespace App\Http\Controllers;

use App\Models\{Despesa, Receita, Gasto};
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Dashboard Financeiro do Usuário
     */
    public function index(): View
    {
        //Soma o valor das receitas do usuário
        $receita = array_sum(
            array_column(Receita::where('user_id', '=', auth()->user()->id)->get()->toArray(), 'valor')
        );

        //Soma o valor das despesas fixas do usuário
        $despesa = array_sum(
            array_column(Despesa::where('user_id', '=', auth()->user()->id)->get()->toArray(), 'valor')
        );

        $gasto = array_sum(
            array_column(Gasto::byMonth(auth()->user()->id, date('m')), 'valor')
        );

        $vencimento = Despesa::aboutExpire(auth()->user()->id, date('d'));

        return view('home', [
            'receita' => $receita,
            'despesa' => $despesa,
            'gasto' => $gasto,
            'orcamento' => $receita - ($despesa + $gasto),
            'vencimento' => count($vencimento)

        ]);
    }
}
