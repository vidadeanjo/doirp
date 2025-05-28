@extends('livewire.priod')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Conteúdo Principal (sem sidebar) -->
        <main class="col-12 px-md-4">
            <div class="mb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Painel Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mensagens</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Mensagens Recebidas</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="badge bg-primary-priod">
                        Total: {{ $mensagens->total() }}
                    </span>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Assunto</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mensagens as $mensagem)
                        <tr class="{{ $mensagem->lida ? '' : 'table-primary' }}">
                            <td>{{ $mensagem->nome }}</td>
                            <td>{{ $mensagem->email }}</td>
                            <td>{{ $mensagem->assunto }}</td>
                            <td>{{ $mensagem->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($mensagem->lida)
                                    <span class="badge bg-secondary">Lida</span>
                                @else
                                    <span class="badge bg-primary-priod">Nova</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin-mensagem-show', $mensagem->id) }}" class="btn btn-sm btn-primary-priod">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin-mensagem-destroy', $mensagem->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Nenhuma mensagem encontrada.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center">
                    {{ $mensagens->links() }}
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
