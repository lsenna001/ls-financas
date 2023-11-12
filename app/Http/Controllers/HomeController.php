<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Models\Receita;
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

        return view('home', [
            'receita' => $receita,
            'despesa' => $despesa
        ]);
    }
}
