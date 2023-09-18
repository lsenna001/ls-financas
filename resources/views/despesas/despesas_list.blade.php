@extends('base/base')

@section('content')
<div class="container flex-column bg-white p-3 rounded">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Despesas Fixas</h3>
        <a class="btn btn-success rounded-pill">
            <i class="fa fa-plus"></i>
            <span>Adicionar Despesa</span>
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($despesas))
            @foreach($despesas as $d)
            <tr>
                <td>{{$d->nome}}</td>
                <td>{{$d->valor}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">
                        Editar
                    </a>
                    <a href="" class="btn btn-sm btn-danger">
                        Remover
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3">Nenhuma despesa encontrada</td>
            </tr>
            @endif
        </tbody>
    </table>
    <hr class="mt-5">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Despesas Fixas</h3>
        <a class="btn btn-success rounded-pill">
            <i class="fa fa-plus"></i>
            <span>Adicionar Despesa</span>
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Prestação do Carro</td>
                <td>
                    <div class="badge bg-warning">
                        R$ 1.100,00
                    </div>
                </td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">
                        <i class="fa fa-pen"></i>
                        Editar
                    </a>
                    <a href="" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                        Remover
                    </a>
                </td>
            </tr>
            <tr>
                <td>Prestação da Casa</td>
                <td>
                    <div class="badge bg-warning">
                        R$ 2.200,00
                    </div>
                </td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">
                        <i class="fa fa-pen"></i>
                        Editar
                    </a>
                    <a href="" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                        Remover
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection