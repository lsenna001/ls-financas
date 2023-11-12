<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    /**
     * Carrega o formulário de alterar a senha
     * @return View
     */
    public function index(): View
    {
        return view('usuarios.reset');
    }

    public function store(PasswordRequest $request): RedirectResponse
    {
        $request->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect(RouteServiceProvider::HOME)->with('msg', ['type' => 'success', 'msg' => 'Senha alterada com sucesso']);
    }
}
