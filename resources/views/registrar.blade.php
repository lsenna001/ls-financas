@extends('base/base')

@section('content')
<div class="form-signin">
    <form method="POST" class="container" style="width: 35rem;">
        @csrf
        <h3>Registre-se</h3>
        <div class="row">
            <div class="col input-group input-group-sm">
                <span class="input-group-text">Nome</span>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="col input-group input-group-sm">
                <span class="input-group-text">Sobrenome</span>
                <input type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="Sobrenome">
            </div>
        </div>
        <div class="row my-2">
            <div class="input-group input-group-sm">
                <span class="input-group-text">Email</span>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="row my-2">
            <div class="input-group input-group-sm">
                <span class="input-group-text">Senha</span>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
            </div>
        </div>
        <div class="row my-2">
            <div class="input-group input-group-sm">
                <span class="input-group-text">Confirme a senha</span>
                <input type="password" name="csenha" id="csenha" class="form-control" placeholder="Confirme a Senha">
            </div>
        </div>
        <button class="btn btn-sm btn-primary w-100">
            <i class="fa fa-plus"></i>
            <span>Registrar</span>
        </button>
    </form>
</div>
@endsection