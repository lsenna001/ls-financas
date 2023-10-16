<nav class="navbar navbar-expand-md bg-primary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{route('dashboard')}}">LS Finanças</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/Fechar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/">Home</a>
                </li>
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Finanças
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{$activeReceitas ?? ''}}" href="{{route('receitas.index')}}">
                                <i class="fas fa-wallet"></i>
                                <span>Receitas</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{$activeDespesas ?? ''}}" href="{{route('despesas.index')}}">
                                <i class="fas fa-hand-holding-usd"></i>
                                <span>Despesas Fixas</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{$activeGastos ?? ''}}" href="">
                                <i class="fas fa-money-bill-wave-alt"></i>
                                <span>Gastos</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('usuarios')
                <li class="nav-item">
                    <a href="/usuarios" class="nav-link text-white">Usuários</a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="" class="nav-link text-white">Alterar Senha</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-white" onclick="event.preventDefault();document.querySelector('#logout').submit()">
                        Deslogar
                    </a>
                    <form action="{{route('logout')}}" method="POST" id="logout">@csrf</form>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link text-white">Registrar</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link text-white">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>