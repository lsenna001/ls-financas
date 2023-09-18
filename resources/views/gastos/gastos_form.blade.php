@extends('base/base')

@section('content')
<div class="rounded text-center p-3 bg-white shadow-lg">
    <div class="d-flex justify-content-center">
        <i class="fas fa-money-check-alt fa-2x px-3"></i>
        <h3 class="fs-3">Inserir Gasto</h3>
    </div>
    <form method="POST" style="width: 30rem;">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text">Descrição</span>
            <input type="text" name="descricao" class="form-control" placeholder="Descrição do Gasto">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Data</span>
            <input type="date" name="data" class="form-control" placeholder="Data">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Valor</span>
            <input type="text" name="valor" class="form-control" placeholder="Valor">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Categoria</span>
            <select name="categoria" class="form-select">
                <option value="">-- Selecione uma categoria --</option>
                <option value="saude">Saúde</option>
                <option value="alimentacao">Alimentação</option>
                <option value="automoveis">Automóveis</option>
                <option value="educacao">Educação</option>
            </select>
        </div>
        <div class="d-flex">
            <a href="/financas/gastos" class="btn btn-sm btn-warning p-2 m-1 w-50">
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