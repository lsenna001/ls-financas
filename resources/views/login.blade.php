@extends('base/base')

@section('content')

<div class="bg-white rounded text-center p-3 shadow-lg">
    <img src="{{ asset('img/login.png') }}" id="loginIcone">
    <h3 class="mb-3 fw-normal">Login</h3>
    <form action="{{ route('login.store') }}" method="POST" class="p-2">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
            @enderror
        </div>
        <div class="form-floating py-2">
            <input type="password" name="password" id="senha" class="form-control @error('password') is-invalid @enderror" placeholder="Senha">
            <label for="senha">Senha</label>
            @error('password')
                <div class="invalid-feedback">
                    {{$errors->first('password')}}
                </div>
            @enderror
        </div>
        <div class="d-flex flex-column">
            <button class="btn btn-sm btn-primary w-100 m-1 p-2">
                <i class="fa fa-sign-in-alt"></i>
                <span>Entrar</span>
            </button>
            <a href="{{ route('registrar.index') }}" class="btn btn-sm btn-info text-white w-100 m-1 p-2">
                <i class="fa fa-edit"></i>
                <span>Registre-Se</span>
            </a>
        </div>
    </form>
</div>

@endsection
