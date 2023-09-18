@extends('base/base')

@section('content')
<div class="container rounded bg-white p-3">
    <div class="d-flex justify-content-between">
        <h3 class="fs-4">Usuários</h3>
        <a href="/registrar" class="btn btn-success">
            <i class="fa fa-user-plus"></i>
            <span>Novo usuário</span>
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome Completo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($usuarios))
            @foreach($usuarios as $u)
            <tr>
                <td>{{$u->nome}} {{$u->sobrenome}}</td>
                <td>
                    <a href="/usuarios/reset" class="btn btn-sm btn-primary">
                        <i class="fa fa-user-lock"></i>
                        <span>Redefinir Senha</span>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="2">Nenhum usuário encontrado</td>
            </tr>
            @endif
        </tbody>
    </table>
    <hr class="mt-4">
    <div class="d-flex justify-content-between">
        <h3 class="fs-4">Usuários</h3>
        <a href="/registrar" class="btn btn-success">
            <i class="fa fa-user-plus"></i>
            <span>Novo usuário</span>
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome Completo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Leonardo Sena</td>
                <td>
                    <a href="/usuarios/reset" class="btn btn-sm btn-primary">
                        <i class="fa fa-user-lock"></i>
                        <span>Redefinir Senha</span>
                    </a>
                    <a href="/usuarios/delete" class="btn btn-sm btn-danger">
                        <i class="fa fa-user-times"></i>
                        <span>Remover Usuário</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>Fulano da Silva</td>
                <td>
                    <a href="/usuarios/reset" class="btn btn-sm btn-primary">
                        <i class="fa fa-user-lock"></i>
                        <span>Redefinir Senha</span>
                    </a>
                    <a href="/usuarios/delete" class="btn btn-sm btn-danger">
                        <i class="fa fa-user-times"></i>
                        <span>Remover Usuário</span>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection