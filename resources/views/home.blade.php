@php use Carbon\Carbon; @endphp
@extends('base/base')

@section('content')
    <div class="container bg-white p-4 rounded text-center">
        <h3 class="fs-2">Dashboard</h3>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12 my-1">
                <div
                    class="d-flex justify-content-between align-items-center rounded border-start border-primary border-4 bg-body-tertiary py-3">
                    <div class="d-flex flex-column px-2">
                        <div class="fs-6 text-primary">Renda Mensal</div>
                        <div class="fs-6 text-primary fw-bold">R$ {{ number_format($receita, 2, ',', '.') }}</div>
                    </div>
                    <i class="fa fa-dollar-sign fa-2x text-primary pe-4"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 my-1">
                <div
                    class="d-flex justify-content-between align-items-center rounded border-start border-warning border-4 bg-body-tertiary py-3">
                    <div class="d-flex flex-column px-2">
                        <div class="fs-6 text-warning">Despesas Fixas</div>
                        <div class="fs-6 text-warning fw-bold">R$ {{ number_format($despesa, 2, ',', '.') }}</div>
                    </div>
                    <i class="fa fa-envelope-open fa-2x text-warning pe-4"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 my-1">
                <div
                    class="d-flex justify-content-between align-items-center rounded border-start border-danger border-4 bg-body-tertiary py-3">
                    <div class="d-flex flex-column px-2">
                        <div class="fs-6 text-danger">Gastos(Este Mês)</div>
                        <div class="fs-6 text-danger fw-bold">R$ {{ number_format($gasto, 2, ',', '.') }}</div>
                    </div>
                    <i class="fa fa-hand-holding-usd fa-2x text-danger pe-4"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 my-1">
                <div
                    class="d-flex justify-content-between align-items-center rounded border-start border-success border-4 bg-body-tertiary py-3">
                    <div class="d-flex flex-column px-2">
                        <div class="fs-6 text-success">Orçamento</div>
                        <div class="fs-6 fw-bold text-{{ $orcamento < 200 ? 'danger' : 'success' }}">
                            R$ {{ number_format($receita - ($despesa + $gasto), 2, ',', '.') }}
                        </div>
                    </div>
                    <i class="fa fa-envelope-open fa-2x text-success pe-4"></i>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6 col-12 my-1">
                <div
                    class="d-flex justify-content-between align-items-center rounded border-start border-alert border-4 bg-body-tertiary py-3">
                    <div class="d-flex flex-column px-2">
                        <div class="fs-6 text-alert">Notificações</div>
                        <div class="fs-6">
                            Você possui {{ $vencimento }} contas perto do vencimento
                        </div>
                    </div>
                    <i class="fa fa-bell fa-2x text-alert pe-4"></i>
                </div>
            </div>
            <div class="col-md-6 col-12 my-1">
                <div
                    class="d-flex justify-content-between align-items-center rounded border-start border-info border-4 bg-body-tertiary py-3">
                    <div class="d-flex flex-column px-2">
                        <div class="fs-6 text-info">Informações</div>
                        <div class="fs-6">
                            Último Acesso: {{ Carbon::parse(auth()->user()->last_access)->format('d/m/Y H:i:s') }}
                        </div>
                    </div>
                    <i class="fa fa-info-circle fa-2x text-info pe-4"></i>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <p class="fs-5">Despesas Mensais</p>
                    </div>
                    <div class="card-body">
                        <canvas id="despesasMensais"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <p class="fs-5">Despesas por Categoria</p>
                    </div>
                    <div class="card-body">
                        <canvas id="despesasCategoria"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
