@extends('base/base')

@section('content')
<div class="container flex-column bg-white p-3 rounded">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Gastos</h3>
        <a class="btn btn-warning rounded-pill" href="/financas/gastos/novo">
            <i class="fa fa-info-circle"></i>
            <span>Informar novo gasto</span>
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
            @if(isset($gastos))
            @foreach($gastos as $g)
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
                <td colspan="3">Nenhum gasto informado</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Total:</th>
                <th scope="col" colspan="2" class="text-danger">R$ 0,00</th>
            </tr>
        </tfoot>
    </table>
    <hr class="mt-5">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Gastos</h3>
        <a class="btn btn-warning rounded-pill" href="/financas/gastos/novo">
            <i class="fa fa-info-circle"></i>
            <span>Informar novo gasto</span>
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
                <td>Compras do Mês</td>
                <td>
                    <div class="badge bg-danger">
                        R$ 1.200,00
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
                <td>Tênis</td>
                <td>
                    <div class="badge bg-danger">
                        R$ 500,00
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
                <th scope="col" colspan="2" class="text-danger">R$ 1.700,00</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection