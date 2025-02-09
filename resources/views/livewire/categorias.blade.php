<div>
    <div>
        <div class="container mt-4">

            <div class="mb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}" class="text-decoration-none">Painel Admin</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin-servicos') }}" class="text-decoration-none">Serviços</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                    </ol>
                </nav>
            </div>

            <h1 class="mb-4">Gerenciar Categorias</h1>
            <div class="row mb-3">
                <div class="col-md-5">
                    <input type="search" class="form-control" id="searchCategory" placeholder="Pesquisar categorias..."
                    wire:model.live="searchTerm">
                </div>
                <div class="col-md-5 text-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        <i class="bi bi-plus-circle me-2"></i>Nova Categoria
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nome }}</td>
                        <td class="description">{{ $categoria->descricao }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-2" wire:click="editCategoria({{ $categoria->id }})">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" wire:click="deleteCategoria({{ $categoria->id }})"
                                onclick="confirm('Tem certeza que deseja deletar esta categoria?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhuma categoria encontrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
    
        </div>
    
        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">{{ $isEditMode ? 'Editar' : 'Adicionar Nova' }} Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="{{ $isEditMode ? 'updateCategoria' : 'createCategoria' }}">
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="categoryName" wire:model="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label">Descrição</label>
                                <textarea class="form-control" id="categoryDescription" wire:model="descricao" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" id="saveCategoryBtn">
                                    {{ $isEditMode ? 'Salvar Alterações' : 'Salvar Categoria' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
