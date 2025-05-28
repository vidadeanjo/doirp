@extends('livewire.priod')
@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- Sidebar Completo -->
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light sidebar-container">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 min-vh-100">
                <!-- Logo e Toggle -->
                <div class="d-flex w-100 justify-content-between align-items-center mb-4 border-bottom pb-2">
                    <a href="{{ route('admin') }}" class="d-flex align-items-center text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline text-primary-priod fw-bold">Painel Admin</span>
                    </a>
                    <button class="btn btn-link d-md-none p-0" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                </div>
                
                <!-- Menu Principal -->
                <div class="collapse d-md-block w-100" id="sidebarMenu">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                        <li class="nav-item w-100 mb-1">
                            <a href="{{ route('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }} align-middle px-3 py-2">
                                <i class="bi bi-speedometer2 me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 mb-1">
                            <a href="#" class="nav-link {{ request()->is('admin/banner*') ? 'active' : '' }} px-3 py-2 align-middle">
                                <i class="bi bi-image me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Banner Principal</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 mb-1">
                            <a href="{{ route('admin-cursos') }}" class="nav-link {{ request()->is('admin/cursos*') ? 'active' : '' }} px-3 py-2 align-middle">
                                <i class="bi bi-book me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Cursos</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 mb-1">
                            <a href="{{ route('admin-servicos') }}" class="nav-link {{ request()->is('admin/servicos*') ? 'active' : '' }} px-3 py-2 align-middle">
                                <i class="bi bi-gear me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Serviços</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 mb-1">
                            <a href="{{ route('admin-mensagens') }}" class="nav-link {{ request()->is('admin/mensagens*') ? 'active' : '' }} px-3 py-2 align-middle">
                                <i class="bi bi-envelope me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Mensagens</span>
                                @if($unreadCount = \App\Models\Mensagem::where('lida', false)->count())
                                    <span class="badge bg-primary-priod rounded-pill float-end">{{ $unreadCount }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item w-100 mb-1">
                            <a href="{{ route('admin-priod-info') }}" class="nav-link {{ request()->is('admin/priod-info*') ? 'active' : '' }} px-3 py-2 align-middle">
                                <i class="bi bi-info-circle me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Informações</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 mb-1">
                            <a href="{{ route('profile') }}" class="nav-link {{ request()->is('profile') ? 'active' : '' }} px-3 py-2 align-middle">
                                <i class="bi bi-person me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item w-100 mt-3 pt-2 border-top">
                            <a href="#" class="nav-link px-3 py-2 align-middle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                <span class="ms-1 d-none d-sm-inline">Sair</span>
                            </a>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="col py-3 main-content">
        

            <!-- Conteúdo da página -->
            <div class="container-fluid">
              

                <!-- Conteúdo dinâmico -->
                <div class="dashboard-content bg-white p-4 rounded shadow-sm">
                    @livewire('dashboard')
                    
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
