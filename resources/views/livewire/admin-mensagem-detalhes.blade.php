@extends('livewire.priod')
@section('content')

<div class="container-fluid">
    <div class="row">
        <main class="col-12 px-md-4">
            <div class="mb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Painel Admin</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin-mensagens') }}">Mensagens</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Detalhes da Mensagem</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('admin-mensagens') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-primary-priod text-white">
                    <h5 class="mb-0">{{ $mensagem->assunto }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Nome:</strong> {{ $mensagem->nome }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ $mensagem->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Enviada em:</strong> {{ $mensagem->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Lida em:</strong> {{ $mensagem->lida_em ? $mensagem->lida_em->format('d/m/Y H:i') : 'Não lida' }}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p><strong>Mensagem:</strong></p>
                        <div class="border p-3 bg-light rounded">
                            {!! nl2br(e($mensagem->mensagem)) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <form action="{{ route('admin-mensagem-destroy', $mensagem->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta mensagem?')">
                            <i class="bi bi-trash"></i> Excluir
                        </button>
                    </form>
                    <a href="mailto:{{ $mensagem->email }}?subject=Re: {{ $mensagem->assunto }}" class="btn btn-primary-priod ms-2">
                        <i class="bi bi-reply"></i> Responder
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
