<header class="bg-light text-primary sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
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
                        <a class="nav-link h-link {{ request()->is('serviconews*') ? 'active' : '' }}" href="{{route('serviconews-public')}}">
                            Serviços
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link {{ request()->is('sobre*') ? 'active' : '' }}" href="{{route('sobre')}}">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link {{ request()->is('contacto*') ? 'active' : '' }}" href="{{route('contacto')}}">Contacto</a>
                    </li>
                </ul>

                @auth
                <div class="dropdown">
                    <button class="btn btn-link text-decoration-none text-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin') }}">
                                <i class="bi bi-speedometer2 me-2"></i>Painel Admin
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="bi bi-person me-2"></i>Perfil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i>Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            
                @endauth
            </div>
        </div>
    </nav>
</header>
