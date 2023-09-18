@extends('base/base')

@section('content')
<div class="container bg-white p-4 rounded text-center">
    <h3 class="fs-2">Dashboard</h3>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 my-1">
            <div class="d-flex justify-content-between align-items-center rounded border-start border-primary border-4 bg-body-tertiary py-3">
                <div class="d-flex flex-column px-2">
                    <div class="fs-6 text-primary">Renda Mensal</div>
                    <div class="fs-6">R$ 12.500,00</div>
                </div>
                <i class="fa fa-dollar-sign fa-2x text-primary pe-4"></i>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 my-1">
            <div class="d-flex justify-content-between align-items-center rounded border-start border-warning border-4 bg-body-tertiary py-3">
                <div class="d-flex flex-column px-2">
                    <div class="fs-6 text-warning">Despesas Fixas</div>
                    <div class="fs-6">R$ 4.750,00</div>
                </div>
                <i class="fa fa-envelope-open fa-2x text-warning pe-4"></i>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 my-1">
            <div class="d-flex justify-content-between align-items-center rounded border-start border-danger border-4 bg-body-tertiary py-3">
                <div class="d-flex flex-column px-2">
                    <div class="fs-6 text-danger">Despesas Móveis(Jan)</div>
                    <div class="fs-6">R$ 2.300,00</div>
                </div>
                <i class="fa fa-hand-holding-usd fa-2x text-danger pe-4"></i>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 my-1">
            <div class="d-flex justify-content-between align-items-center rounded border-start border-success border-4 bg-body-tertiary py-3">
                <div class="d-flex flex-column px-2">
                    <div class="fs-6 text-success">Orçamento</div>
                    <div class="fs-6">R$ 5.450,00</div>
                </div>
                <i class="fa fa-envelope-open fa-2x text-success pe-4"></i>
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