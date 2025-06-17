<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Gestão de Serviços Novos (Teste)</h3>
                </div>
                <div class="card-body">
                    
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Formulário -->
                    <form wire:submit.prevent="{{ $isEditMode ? 'updateServiconew' : 'createServiconew' }}">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome do Serviço</label>
                                <input type="text" class="form-control" id="nome" wire:model="nome" required>
                                @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="categoria" class="form-label">Categoria (Texto)</label>
                                <input type="text" class="form-control" id="categoria" wire:model="categoria" placeholder="Ex: Desenvolvimento, Consultoria...">
                                @error('categoria') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricao" wire:model="descricao" rows="3"></textarea>
                            @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ $isEditMode ? 'Atualizar' : 'Criar' }} Serviço
                            </button>
                            @if($isEditMode)
                                <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancelar</button>
                            @endif
                        </div>
                    </form>

                    <!-- Busca -->
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Buscar serviços..." wire:model="searchTerm">
                    </div>

                    <!-- Lista de Serviços -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($serviconews as $serviconew)
                                    <tr>
                                        <td>{{ $serviconew->id }}</td>
                                        <td>{{ $serviconew->nome }}</td>
                                        <td>{{ $serviconew->categoria ?? 'Sem categoria' }}</td>
                                        <td>{{ Str::limit($serviconew->descricao, 50) }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" wire:click="editServiconew({{ $serviconew->id }})">
                                                Editar
                                            </button>
                                            <button class="btn btn-sm btn-danger" wire:click="deleteServiconew({{ $serviconew->id }})" 
                                                    onclick="return confirm('Tem certeza?')">
                                                Deletar
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhum serviço encontrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
