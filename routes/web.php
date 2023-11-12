<?php

use App\Http\Controllers\{Auth\AuthController,
    Auth\PasswordController,
    Auth\RegisterController,
    DespesaController,
    GastoController,
    HomeController,
    ReceitaController};
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

Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

/**
 * Rotas de Autenticação
 */
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/registrar', [RegisterController::class, 'index'])->name('registrar.index');
Route::post('/registrar', [RegisterController::class, 'store'])->name('registrar.store');
Route::post('/logout', [AuthController::class, 'destroy'])->name('login.destroy')->middleware('auth');

/**
 * Rotas de Alterar a senha
 */
Route::get('/alterar-senha', [PasswordController::class, 'index'])->name('password.index')->middleware('auth');
Route::post('/alterar-senha', [PasswordController::class, 'store'])->name('password.store')->middleware('auth');

/**
 * Rotas para finanças
 */
Route::middleware('auth')->prefix('financas')->group(function() {
    Route::resource('receitas', ReceitaController::class)->names('receitas');
    Route::resource('despesas', DespesaController::class)->names('despesas');
    Route::resource('gastos', GastoController::class)->names('gastos');
});
