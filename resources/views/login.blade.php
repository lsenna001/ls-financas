@extends('base/base')

@section('content')

<div class="bg-white rounded text-center p-3 shadow-lg">
    <img src="{{asset('img/login.png')}}" id="loginIcone">
    <h3 class="mb-3 fw-normal">Login</h3>
    <form method="POST" class="p-2">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating py-2">
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
            <label for="password">Senha</label>
        </div>
        <div class="d-flex flex-column">
            <button class="btn btn-sm btn-primary w-100 m-1 p-2">
                <i class="fa fa-sign-in-alt"></i>
                <span>Entrar</span>
            </button>
            <a href="/registrar" class="btn btn-sm btn-info text-white w-100 m-1 p-2">
                <i class="fa fa-edit"></i>
                <span>Registre-Se</span>
            </a>
        </div>
    </form>
</div>

@endsection