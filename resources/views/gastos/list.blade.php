@php use Carbon\Carbon; @endphp
@extends('base/base')

@section('content')
    <div class="container flex-column bg-white p-3 rounded">
        <div class="d-flex justify-content-between">
            <h3 class="fs-3">Gastos</h3>
            <a class="btn btn-warning rounded-pill" href="{{ route('gastos.create') }}">
                <i class="fa fa-info-circle"></i>
                <span>Informar novo gasto</span>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($gastos))
                @foreach($gastos as $g)
                    <tr>
                        <td>{{ $g['descricao']}}</td>
                        <td>
                            <div class="badge bg-danger">
                                R${{ number_format($g['valor'], 2, ',', '.')}}
                            </div>
                        </td>
                        <td>{{ Carbon::parse($g['data'])->format('d/m/Y') }}</td>
                        <td>
                            <div class="badge bg-info rounded-3">
                                {{ $g['categoria']['nome_categoria'] }}
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('gastos.edit', $g['id_gasto']) }}"
                               class="btn btn-sm btn-warning rounded-pill text-white">
                                <i class="fa fa-edit"></i>
                                Editar
                            </a>
                            <a href="{{ route('gastos.destroy', $g['id_gasto']) }}"
                               class="btn btn-sm btn-danger rounded-pill"
                               onclick="event.preventDefault();document.querySelector('#deleteGasto{{ $g['id_gasto'] }}').submit()">
                                <i class="fa fa-trash"></i>
                                Remover
                            </a>
                            <form action="{{ route('gastos.destroy', $g['id_gasto']) }}" method="POST"
                                  id="deleteGasto{{ $g['id_gasto'] }}">@csrf @method('delete')</form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Nenhum gasto informado</td>
                </tr>
            @endif
            </tbody>
            <tfoot>
            <tr>
                <th scope="col">Total:</th>
                <th scope="col" colspan="5" class="text-danger">R$ {{ number_format($total, 2, ',', '.') }}</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
