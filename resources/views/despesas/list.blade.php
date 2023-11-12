@extends('base/base')

@section('content')
<div class="container flex-column bg-white p-3 rounded">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Despesas Fixas</h3>
        <a class="btn btn-success rounded-pill" href="{{route('despesas.create')}}">
            <i class="fa fa-plus"></i>
            <span>Adicionar Despesa</span>
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($despesas))
            @foreach($despesas as $d)
            <tr>
                <td>{{$d['descricao']}}</td>
                <td>
                    <div class="badge bg-warning">
                        R${{number_format($d['valor'], 2, ',', '.')}}</td>
                    </div>
                <td>
                    <div class="badge bg-info">
                        {{$d['categoria']['nome_categoria']}}
                    </div>
                </td>
                <td>
                    <a href="{{route('despesas.edit', $d['id_despesa'])}}" class="btn btn-sm btn-warning rounded-pill text-white">
                        <i class="fa fa-edit"></i>
                        Editar
                    </a>
                    <a href="{{route('despesas.index')}}" class="btn btn-sm btn-danger rounded-pill" onclick="event.preventDefault();document.querySelector('#deleteDespesa{{$d['id_despesa']}}').submit()">
                        <i class="fa fa-trash"></i>
                        Remover
                    </a>
                    <form action="{{route('despesas.destroy', $d['id_despesa'])}}" method="POST" id="deleteDespesa{{$d['id_despesa']}}">@csrf @method('delete')</form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">Nenhuma despesa encontrada</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Total:</th>
                <th scope="col" colspan="3" class="text-warning">R${{number_format($total, 2, ',', '.')}}</th>
            </tr>
        </tfoot>
    </table>
</div>

@endsection
