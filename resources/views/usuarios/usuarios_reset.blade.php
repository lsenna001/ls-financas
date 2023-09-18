@extends('base/base')

@section('content')

<div class="rounded bg-white p-3 shadow-lg">
    <div class="d-flex justify-content-center mb-3">
        <h3 class="fs-3">Alterar Senha</h3>
    </div>
    <form method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">Atual Senha</span>
            <input type="password" name="old_password" class="form-control" placeholder="Atual Senha">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Nova Senha</span>
            <input type="password" name="new_password" class="form-control" placeholder="Nova Senha">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Confirme a Nova Senha</span>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirme a Nova Senha">
        </div>
        <button class="btn btn-sm btn-success w-100 p-2">
            <i class="fa fa-key"></i>
            <span>Alterar</span>
        </button>
    </form>
</div>

@endsection