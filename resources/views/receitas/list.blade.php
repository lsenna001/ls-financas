@extends('base/base')

@section('content')
<div class="container flex-column bg-white p-3 rounded">
    <div class="d-flex justify-content-between">
        <h3 class="fs-3">Receitas</h3>
        <a class="btn btn-success rounded-pill" href="{{ route('receitas.create') }}">
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
            @if(!empty($receitas))
            @foreach($receitas as $r)
            <tr>
                <td>{{ $r['empresa'] }}</td>
                <td class="text-primary fw-bold">
                    <div class="badge bg-primary">
                        R${{ number_format($r['valor'], 2, ',', '.') }}
                    </div>
                </td>
                <td>
                    <a href="{{ route('receitas.edit', $r['id_receita']) }}" class="btn btn-sm btn-warning rounded-pill text-white">
                        <i class="fa fa-edit"></i>
                        Editar
                    </a>
                    <a href="{{ route('receitas.index') }}" class="btn btn-sm btn-danger rounded-pill" onclick="event.preventDefault();document.querySelector('#deleteReceita{{$r['id_receita']}}').submit()">
                        <i class="fa fa-trash"></i>
                        Remover
                    </a>
                    <form id="deleteReceita{{ $r['id_receita'] }}" action="{{ route('receitas.destroy', $r['id_receita']) }}" method="POST">@csrf @method('delete')</form>
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
                <th scope="col" colspan="2" class="text-primary">R${{ number_format($total, 2, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
