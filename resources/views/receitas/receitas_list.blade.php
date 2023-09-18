@extends('base/base')

@section('content')
<div class="container flex-column bg-white p-3 rounded">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Receitas</h3>
        <a class="btn btn-success rounded-pill" href="/financas/receitas/nova">
            <i class="fa fa-plus"></i>
            <span>Adicionar Receita</span>
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
            @if(isset($receitas))
            @foreach($receitas as $r)
            <tr>
                <td>{{$r->nome}}</td>
                <td>{{$r->valor}}</td>
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
                <td colspan="3">Nenhuma receita encontrada</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Total:</th>
                <th scope="col" colspan="2" class="text-primary">R$ 0,00</th>
            </tr>
        </tfoot>
    </table>
    <hr class="mt-5">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Receitas</h3>
        <a class="btn btn-success rounded-pill">
            <i class="fa fa-plus"></i>
            <span>Adicionar Receita</span>
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
                <td>Emprego 1</td>
                <td>
                    <div class="badge bg-primary">
                        R$ 3.500,00
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
                <td>Emprego 2</td>
                <td>
                    <div class="badge bg-primary">
                        R$ 6.700,00
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
        <tfoot>
            <tr>
                <th scope="col">Total:</th>
                <th scope="col" colspan="2" class="text-primary">R$ 10.200,00</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection