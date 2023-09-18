@extends('base/base')

@section('content')

<div class="form-signin" id="form_login">
    <form method="POST" class="container">
        @csrf
        <h3 class="mb-3 fw-normal">Login</h3>
        <div class="form-floating text-dark">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating text-dark">
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
            <label for="password">Senha</label>
        </div>
        <button class="btn btn-sm btn-primary w-100">
            <i class="fa fa-sign-in-alt"></i>
            <span>Entrar</span>
        </button>
    </form>
</div>

@endsection