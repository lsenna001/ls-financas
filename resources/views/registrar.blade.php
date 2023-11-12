@extends('base/base')

@section('content')
<div class="rounded bg-white text-center p-3 shadow-lg">
    <form action="{{ route('registrar.store') }}" method="POST" class="container" style="width: 35rem;">
        @csrf
        <h3 class="fs-2 py-2">Registre-se</h3>
        <div class="row">
            <div class="col input-group">
                <span class="input-group-text">Nome</span>
                <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome" value="{{ old('nome') }}">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $errors->first('nome') }}
                    </div>
                @enderror
            </div>
            <div class="col input-group">
                <span class="input-group-text">Sobrenome</span>
                <input type="text" name="sobrenome" id="sobrenome" class="form-control @error('sobrenome') is-invalid @enderror" placeholder="Sobrenome" value="{{ old('sobrenome') }}">
                @error('sobrenome')
                <div class="invalid-feedback">
                    {{ $errors->first('sobrenome') }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row my-2">
            <div class="input-group">
                <span class="input-group-text">Email</span>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row my-2">
            <div class="input-group">
                <span class="input-group-text">Senha</span>
                <input type="password" name="password" id="senha" class="form-control @error('password') is-invalid @enderror" placeholder="Senha">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row my-2">
            <div class="input-group">
                <span class="input-group-text">Confirme a senha</span>
                <input type="password" name="password_confirmation" id="csenha" class="form-control" placeholder="Confirme a Senha">
            </div>
        </div>
        <button class="btn btn-sm btn-primary w-100 p-2">
            <i class="fa fa-plus"></i>
            <span>Registrar</span>
        </button>
    </form>
</div>
@endsection
