<?php

use App\Http\Controllers\{HomeController, ProfileController, ReceitaController, DespesaController, GastoController};
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

Route::middleware('auth')->prefix('financas')->group(function() {
    Route::resource('receitas', ReceitaController::class)->names('receitas');
    Route::resource('despesas', DespesaController::class)->names('despesas');
    Route::resource('gastos', GastoController::class)->names('gastos');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
