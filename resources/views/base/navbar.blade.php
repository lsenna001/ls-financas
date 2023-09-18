<nav class="navbar navbar-expand-md bg-primary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">LS Finanças</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/Fechar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/registrar" class="nav-link text-white">Registrar</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link text-white">Login</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Finanças
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/financas/receitas">
                                <i class="fas fa-wallet"></i>
                                <span>Receitas</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/financas/despesas">
                                <i class="fas fa-hand-holding-usd"></i>
                                <span>Despesas Fixas</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/financas/gastos">
                                <i class="fas fa-money-bill-wave-alt"></i>
                                <span>Gastos</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/usuarios" class="nav-link text-white">Usuários</a>
                </li>
                <li class="nav-item">
                    <a href="/usuarios/mudar-senha" class="nav-link text-white">Alterar Senha</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link text-white">Deslogar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>