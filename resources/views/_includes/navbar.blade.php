<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top mt-2 mb-2 shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/webtransito/home')}}"> <img src="{{asset('Imagens/logoSistema.png')}}" width="60"  alt="Início"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="btn nav-link active" data-bs-toggle="modal" data-bs-target="#modal" aria-current="page">Novo AIT</a>
                </li>
                <li class="nav-item">
                    <a class="btn nav-link" href="{{route('register')}}">Cadastrar Usuário</a>
                </li>
                <li class="nav-item">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Pesquisar
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                              <li><a class="dropdown-item" href="">Meus Registros</a></li>
                              <li><a class="dropdown-item" href="">Pesquisa Avançada</a></li>
                            </ul>
                          </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="col-lg navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-link"> </li>
            </ul>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <span>
                    <div>
                        <form method="POST" action="">
                            @csrf
                            <li class="nav-item">
                                <a class="btn nav-link" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Sair') }}
                                </a>
                            </li>
                        </form>
                    </div>
                </span>
            </ul>
        </div>
    </div>
</nav>
