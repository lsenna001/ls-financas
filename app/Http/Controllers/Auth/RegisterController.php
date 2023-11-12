<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('registrar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed']
        ], [
            'nome.required' => 'O Nome é obrigatório',
            'nome.max' => 'O Nome deve ter no máximo 255 caracteres',
            'nome.string' => 'O Nome deve conter somente carateres',
            'sobrenome.required' => 'O Sobrenome é obrigatório',
            'sobrenome.max' => 'O Sobrenome deve ter no máximo 255 caracteres',
            'sobrenome.string' => 'O Sobrenome deve conter somente carateres',
            'email.required' => 'O Email é obrigatório',
            'email.email' => 'O Email não é válido',
            'email.unique' => 'Este Email já está cadastrado',
            'password.required' => 'A Senha é obrigatória',
            'password.confirmed' => 'As senhas não conferem'
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
