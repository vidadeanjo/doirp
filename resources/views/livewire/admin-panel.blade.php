<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item w-100 mb-1">
                        <a href="{{ route('admin-dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }} px-3 py-2 align-middle">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 mb-1">
                        <a href="{{ route('admin-users') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }} px-3 py-2 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Usuários</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 mb-1">
                        <a href="{{ route('admin-roles') }}" class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }} px-3 py-2 align-middle">
                            <i class="fs-4 bi-person-badge"></i> <span class="ms-1 d-none d-sm-inline">Funções</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 mb-1">
                        <a href="{{ route('admin-permissions') }}" class="nav-link {{ request()->is('admin/permissions') ? 'active' : '' }} px-3 py-2 align-middle">
                            <i class="fs-4 bi-key"></i> <span class="ms-1 d-none d-sm-inline">Permissões</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 mb-1">
                        <a href="{{ route('admin-servicos') }}" class="nav-link {{ request()->is('admin/servicos') && !request()->is('admin/serviconews') ? 'active' : '' }} px-3 py-2 align-middle">
                            <i class="bi bi-gear me-2"></i>
                            <span class="ms-1 d-none d-sm-inline">Serviços</span>
                        </a>
                    </li>
                    <li class="nav-item w-100 mb-1">
                        <a href="{{ route('admin-serviconews') }}" class="nav-link {{ request()->is('admin/serviconews*') ? 'active' : '' }} px-3 py-2 align-middle">
                            <i class="bi bi-gear-fill me-2 text-warning"></i>
                            <span class="ms-1 d-none d-sm-inline">Serviços Teste</span>
                            <small class="badge bg-warning text-dark ms-1">TESTE</small>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Sign out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            @yield('content')
        </div>
    </div>
</div>
