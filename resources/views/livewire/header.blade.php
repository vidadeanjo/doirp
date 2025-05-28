<header class="bg-light text-primary sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('inicio')}}">
                <img src="{{ asset('build/assets/imgs/logo.png')}}" alt="PRIOD Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link h-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('inicio')}}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link {{ request()->is('cursos*') ? 'active' : '' }}" href="{{route('cursos')}}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link {{ request()->is('servicos*') ? 'active' : '' }}" href="{{route('servicos')}}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link {{ request()->is('sobre*') ? 'active' : '' }}" href="{{route('sobre')}}">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link {{ request()->is('contacto*') ? 'active' : '' }}" href="{{route('contacto')}}">Contacto</a>
                    </li>
                </ul>

                @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none text-primary">
                        <i class="bi bi-box-arrow-right"></i> Sair
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </nav>
</header>
