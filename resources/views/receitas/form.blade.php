@extends('base/base')

@section('content')
    <div class="rounded text-center p-3 bg-white shadow-lg">
        <div class="d-flex justify-content-center">
            <i class="fa fa-clipboard-list fa-2x px-3"></i>
            <h3 class="fs-3">{{ isset($receita) ? 'Alterar' : 'Inserir' }} Receita</h3>
        </div>
        <form action="{{ isset($receita) ? route('receitas.update', $receita['id_receita']) : route('receitas.store') }}"
              method="POST" style="width: 30rem;">
            @csrf
            @isset($receita)
                @method('put')
            @endisset
            <div class="input-group mb-3">
                <span class="input-group-text">Empresa</span>
                <input type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror"
                       placeholder="Nome da Empresa"
                       value="{{ isset($receita) ? $receita['empresa']: old('empresa') }}">
                @error('empresa')
                <div class="invalid-feedback">
                    {{ $errors->first('empresa') }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Valor</span>
                <input type="text" name="valor" class="form-control money @error('valor') is-invalid @enderror"
                       placeholder="Valor Recebido" value="{{ isset($receita) ? $receita['valor'] : old('valor') }}">
                @error('valor')
                <div class="invalid-feedback">
                    {{ $errors->first('valor') }}
                </div>
                @enderror
            </div>
            <div class="d-flex">
                <a href="{{ route('receitas.index') }}" class="btn btn-sm btn-warning p-2 m-1 w-50 text-white">
                    <i class="fa fa-arrow-left"></i>
                    <span>Voltar</span>
                </a>
                @isset($receita)
                    <button class="btn btn-sm btn-success p-2 m-1 w-50">
                        <i class="fa fa-save"></i>
                        <span>Alterar</span>
                    </button>
                @else
                    <button class="btn btn-sm btn-success p-2 m-1 w-50">
                        <i class="fa fa-plus"></i>
                        <span>Registrar</span>
                    </button>
                @endisset
            </div>
        </form>
    </div>
@endsection
