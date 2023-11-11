@extends('base/base')

@section('content')
    <div class="rounded text-center p-3 bg-white shadow-lg">
        <div class="d-flex justify-content-center">
            <i class="fas fa-money-check-alt fa-2x px-3"></i>
            <h3 class="fs-3">{{ isset($gasto) ? 'Alterar' : 'Inserir novo' }} Gasto</h3>
        </div>
        <form action="{{ isset($gasto) ? route('gastos.update', $gasto->id_gasto) : route('gastos.store') }}" method="POST" style="width: 30rem;">
            @csrf
            @isset($gasto)
                @method('put')
            @endisset
            <div class="input-group mb-3">
                <span class="input-group-text">Descrição</span>
                <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
                       placeholder="Descrição do Gasto" value="{{ isset($gasto) ? $gasto->descricao : old('descricao') }}">
                @error('descricao')
                <div class="invalid-feedback">
                    {{$errors->first('descricao')}}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Data</span>
                <input type="date" name="data" class="form-control @error('data') is-invalid @enderror"
                       placeholder="Data" value="{{ isset($gasto) ? $gasto->data :old('data') }}">
                @error('data')
                <div class="invalid-feedback">
                    {{$errors->first('data')}}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Valor</span>
                <input type="text" name="valor" class="form-control @error('valor') is-invalid @enderror"
                       placeholder="Valor" value="{{ isset($gasto) ? $gasto->valor : old('valor') }}">
                @error('valor')
                <div class="invalid-feedback">
                    {{$errors->first('valor')}}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Categoria</span>
                <select name="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror">
                    <option value="">-- Selecione uma categoria --</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id_categoria }}" {{ isset($gasto) && $gasto->categoria_id == $cat->id_categoria ? 'selected' : (old('categoria_id') == $cat->id_categoria ? 'selected' : '') }}>{{ $cat->nome_categoria }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                <div class="invalid-feedback">
                    {{$errors->first('categoria_id')}}
                </div>
                @enderror
            </div>
            <div class="d-flex">
                <a href="{{ route('gastos.index') }}" class="btn btn-sm btn-warning p-2 m-1 w-50">
                    <i class="fa fa-arrow-left"></i>
                    <span>Voltar</span>
                </a>
                <button class="btn btn-sm btn-{{ isset($gasto) ? 'primary' : 'success' }} p-2 m-1 w-50">
                    <i class="fa fa-{{ isset($gasto) ? 'edit' : 'plus' }}"></i>
                    <span>{{ isset($gasto) ? 'Alterar' : 'Registrar' }}</span>
                </button>
            </div>

        </form>

    </div>
@endsection
