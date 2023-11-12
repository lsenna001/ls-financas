@extends('base/base')

@section('content')
    <div class="rounded text-center p-3 bg-white shadow-lg">
        <div class="d-flex justify-content-center">
            <i class="fas fa-money-check-alt fa-2x px-3"></i>
            <h3 class="fs-3">{{ isset($despesa) ? 'Alterar' : 'Inserir' }} Despesa</h3>
        </div>
        <form
            action="{{ isset($despesa) ? route('despesas.update', $despesa['id_despesa']) : route('despesas.store') }}"
            method="POST" style="width: 30rem;">
            @csrf
            @isset($despesa)
                @method('put')
            @endisset
            <div class="input-group mb-3">
                <span class="input-group-text">Descrição</span>
                <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" placeholder="Descrição do Gasto"
                       value="{{ isset($despesa) ? $despesa->descricao : old('descricao') }}">
                @error('descricao')
                    <div class="invalid-feedback">
                        {{ $errors->first('descricao') }}
                    </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Dia do Vencimento</span>
                <select name="dia_vencimento" class="form-select @error('dia_vencimento') is-invalid @enderror">
                    <option value="">-- Dia do vencimento --</option>
                    @for($i = 1; $i <= 31; $i++)
                        <option
                            value="{{ $i }}" {{ isset($despesa) ? ($despesa->dia_vencimento == $i ? 'selected' : ''): (old('dia_vencimento') == $i ? 'selected' : '') }}>{{ $i }}</option>
                    @endfor
                </select>
                @error('dia_vencimento')
                <div class="invalid-feedback">
                    {{ $errors->first('dia_vencimento') }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Valor</span>
                <input type="text" name="valor" class="form-control money @error('valor') is-invalid @enderror" placeholder="Valor"
                       value="{{ isset($despesa) ? $despesa->valor : old('valor') }}">
                @error('valor')
                <div class="invalid-feedback">
                    {{ $errors->first('valor') }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Categoria</span>
                <input type="text" list="categoria" name="categoria" class="form-select @error('categoria') is-invalid @enderror" value="{{ isset($despesa) ? $despesa->categoria->nome_categoria : old('categoria') }}">
                <datalist id="categoria">
                    @foreach($categorias as $cat)
                        <option value="{{ $cat['nome_categoria'] }}"></option>
                    @endforeach
                </datalist>
                @error('categoria')
                <div class="invalid-feedback">
                    {{ $errors->first('categoria') }}
                </div>
                @enderror
            </div>
            <div class="d-flex">
                <a href="{{ route('despesas.index') }}" class="btn btn-sm btn-warning p-2 m-1 w-50 text-white">
                    <i class="fa fa-arrow-left"></i>
                    <span>Voltar</span>
                </a>
                @isset($despesa)
                    <button class="btn btn-sm btn-primary p-2 m-1 w-50">
                        <i class="fa fa-save"></i>
                        <span>Alterar</span>
                    </button>
                @else
                    <button class="btn btn-sm btn-success p-2 m-1 w-50">
                        <i class="fa fa-plus"></i>
                        <span>Registrar</span>
                    </button>
                @endif
            </div>

        </form>

    </div>
@endsection
