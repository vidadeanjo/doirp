
@extends('livewire.priod')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block  sidebar ">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-image"></i> Editar Banner Principal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin-cursos')}}">
                            <i class="bi bi-book"></i> Cursos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin-servicos')}}">
                            <i class="bi bi-gear"></i> Serviços
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin-priod-info')}}">
                            <i class="bi bi-file-earmark-text"></i> Editar Informações gerias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">
                            <i class="bi bi-person"></i> Editar Perfil de Admin
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <!-- Dashboard Summary -->
            <div >
               @livewire('dashboard')
            </div>
           
        </main>
    </div>
</div>
    @if (session()->has('success'))
    @include('sessionComponent.sucess')
    @endif
    @endsection
