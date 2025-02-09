

<header class="bg-light text-primary sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('inicio')}}">
                <img src={{ asset('build/assets/imgs/logo.png')}} alt="PRIOD Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item " >
                        <a class="nav-link h-link " href="{{route('inicio')}}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link active" href="{{route('cursos')}}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link" href="{{route('servicos')}}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link" href="{{route('sobre')}}">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h-link" href="{{route('contacto')}}">Contacto</a>
                    </li>
                </ul>

                @auth
                <button class="text-decoration-none w-full text-start border-0 bg-transparent" wire:click="logout" ><i class="bi bi-box-arrow-right"></i>
                    {{ __('Sair') }}
                </button>
              
                @endauth
            </div>
        </div>
    </nav>
</header>

</div>