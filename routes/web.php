<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Página inicial
 */
Route::get('/', function () {
    return view('home');
});

/**
 * Página de Login
 */
Route::get('/login', function () {
    return view('login');
});

/**
 * Página de Registro
 */
Route::get('/registrar', function () {
    return view('registrar');
});

/**
 * Módulo de finanças
 */
Route::prefix('financas')->group(function () {

    Route::prefix('receitas')->group(function () {
        Route::get('/', function () {
            return view('receitas/receitas_list');
        });

        Route::get('/nova', function () {
            return view('receitas/receitas_form');
        });
    });

    Route::prefix('despesas')->group(function () {
        Route::get('/', function () {
            return view('despesas/despesas_list');
        });

        Route::get('/nova', function () {
            return view('despesas/despesas_form');
        });
    });

    Route::prefix('gastos')->group(function () {
        Route::get('/', function () {
            return view('gastos/gastos_list');
        });

        Route::get('/novo', function () {
            return view('gastos/gastos_form');
        });
    });
});

/**
 * Módulo de Usuários
 */
Route::prefix('usuarios')->group(function () {
    Route::get('/', function () {
        return view('usuarios/usuarios_list');
    });

    Route::get('/mudar-senha', function () {
        return view('usuarios/usuarios_reset');      
    });
});
