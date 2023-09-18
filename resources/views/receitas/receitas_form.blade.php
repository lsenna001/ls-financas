@extends('base/base')

@section('content')
<div class="rounded text-center p-3 bg-white shadow-lg">
    <div class="d-flex justify-content-center">
        <i class="fa fa-clipboard-list fa-2x px-3"></i>
        <h3 class="fs-3">Inserir Receita</h3>
    </div>
    <form method="POST" style="width: 30rem;">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">Empresa</span>
            <input type="text" name="empresa" class="form-control" placeholder="Nome da Empresa">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Valor</span>
            <input type="text" name="valor" class="form-control" placeholder="Valor Recebido">
        </div>
        <div class="d-flex">
            <a href="/financas/receitas" class="btn btn-sm btn-warning p-2 m-1 w-50">
                <i class="fa fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
            <button class="btn btn-sm btn-success p-2 m-1 w-50">
                <i class="fa fa-plus"></i>
                <span>Registrar</span>
            </button>
        </div>

    </form>

</div>
@endsection