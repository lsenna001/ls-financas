<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Dashboard Financeiro do Usuário
     */
    public function index(): View
    {
        return view('home');
    }
}
