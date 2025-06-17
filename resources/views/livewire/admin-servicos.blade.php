<div>
    <div class="container mt-4">

        <div class="mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin') }}">Painel Admin</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Serviços</li>
                </ol>
            </nav>
        </div>

        <h1 class="mb-4">Gerenciar Serviços</h1>
        <div class="row mb-3">
            <div class="col-md-5">
                <input type="search" class="form-control" id="searchService" placeholder="Pesquisar serviços..."
                    wire:model.live="searchTerm">
            </div>
            <div class="col-md-2 text-start mt-2 mb-2">
                <a href="{{route('admin-servicos-categorias')}}" class="link-secondary text-decoration-none">
                    <i class="bi bi-setting me-2"></i>Gerenciar Categorias
                </a>
            </div>
            <div class="col-md-5 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <i class="bi bi-plus-circle me-2"></i>Novo Serviço
                </button>
            </div>
        </div>
    
        @if (session()->has('message'))
        <div id="flash-message" class="flash-message">
            {{ session('message') }}
        </div>
        @endif
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($servicos as $servico)
                <tr>
                    <td>{{ $servico->nome }}</td>
                    <td class="description">{{ $servico->descricao }}</td>
                    <td>{{ $servico->categoria->nome ?? 'Sem Categoria' }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-2" wire:click="editServico({{ $servico->id }})">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" wire:click="deleteServico({{ $servico->id }})"
                            onclick="confirm('Tem certeza que deseja deletar este serviço?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhum serviço encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
    
    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">{{ $isEditMode ? 'Editar' : 'Adicionar Novo' }} Serviço</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $isEditMode ? 'updateServico' : 'createServico' }}">
                        @csrf
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="serviceName" wire:model="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="serviceDescription" wire:model="descricao" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="serviceCategory" class="form-label">Categoria</label>
                            <select class="form-select" id="serviceCategory" wire:model="categoriaId" required>
                                <option value="">Selecione uma categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="saveServiceBtn">
                                {{ $isEditMode ? 'Salvar Alterações' : 'Salvar Serviço' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>