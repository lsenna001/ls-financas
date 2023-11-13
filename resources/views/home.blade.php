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
                        <div class="fs-6 fw-bold text-{{ $orcamento < 0 ? 'danger' : 'success' }}">
                            R$ {{ number_format($orcamento, 2, ',', '.') }}
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
                        <p class="fs-5">Valor de Despesas Fixas por Categoria</p>
                    </div>
                    <div class="card-body">
                        <canvas id="despesasCategoria"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <p class="fs-5">Valor de Gastos(Este Mês) por Categoria</p>
                    </div>
                    <div class="card-body">
                        <canvas id="gastosCategoria"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <p class="fs-5">Quantidade de Despesas Fixas por Categoria</p>
                    </div>
                    <div class="card-body">
                        <canvas id="despesasQuantidade"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <p class="fs-5">Quantidade de Gastos(Este Mês) por Categoria</p>
                    </div>
                    <div class="card-body">
                        <canvas id="gastosQuantidade"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_script')
    <script>
        $(document).ready(function () {
            const despesasCategorias = new Chart($("#despesasCategoria"), {
                type: "bar",
                data: {
                    labels: <?= json_encode(array_column($despesasPorCategoria, 'nome_categoria'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?>,
                    datasets: [{
                        label: 'Valor: R$',
                        data: <?= json_encode(array_column($despesasPorCategoria, 'total'), JSON_PRETTY_PRINT) ?>,
                        borderWidth: 1,
                        backgroundColor: '#d3da67'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const gastosCategorias = new Chart($("#gastosCategoria"), {
                type: "bar",
                data: {
                    labels: <?= json_encode(array_column($gastosPorCategoria, 'nome_categoria'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?>,
                    datasets: [{
                        label: "Valor: R$",
                        data: <?= json_encode(array_column($gastosPorCategoria, 'total'), JSON_PRETTY_PRINT) ?>
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const despesasQuantidade = new Chart($("#despesasQuantidade"), {
                type: "bar",
                data: {
                    labels: <?= json_encode(array_column($qtdDespesasCategoria, 'nome_categoria'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?>,
                    datasets: [{
                        label: "Quantidade: ",
                        data: <?= json_encode(array_column($qtdDespesasCategoria, 'total'), JSON_PRETTY_PRINT) ?>,
                        backgroundColor: '#dee711'

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const gastosQuantidade = new Chart($("#gastosQuantidade"), {
                type: "bar",
                data: {
                    labels: <?= json_encode(array_column($qtdGastosCategoria, 'nome_categoria'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?>,
                    datasets: [{
                        label: "Quantidade: ",
                        data: <?= json_encode(array_column($qtdGastosCategoria, 'total'), JSON_PRETTY_PRINT) ?>,
                        backgroundColor: '#2d54ba'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        });
    </script>
@endsection
