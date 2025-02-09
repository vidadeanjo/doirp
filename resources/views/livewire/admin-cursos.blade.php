<div>
           
    <div class="container mt-4">
        <div class="mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin') }}">Painel Admin</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cursos</li>
                </ol>
            </nav>
        </div>

        <h1 class="mb-4">Gerenciar Cursos admin</h1>
        <div class="row mb-3">
            <div class="col-md-6 mt-2">
                <input 
                    type="search" 
                    class="form-control" 
                    id="searchCourse" 
                    wire:model.live="search"
                    placeholder="Pesquisar cursos...">
            </div>
            <div class="col-md-6 text-end mt-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <i class="bi bi-plus-circle me-2"></i>Novo Curso
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
                    <th>Duração</th>
                    <th>Preço</th>
                    <th>Destaque</th>
                    <th>Modalidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="courseTableBody">
                @forelse ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td class="description">{{ $curso->descricao }}</td>
                    <td>{{ $curso->duracao }}</td>
                    <td>{{ $curso->preco }}</td>
                    <td> 
                        <div class="form-check form-switch">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                wire:click="toggleDestaque({{ $curso->id }})"
                                {{ $curso->destaque ? 'checked' : '' }}
                            >
                        </div>
                    </td>
                    <td>{{ $curso->modalidade }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-2" wire:click="editCurso({{ $curso->id }})"  ><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger" wire:click="deleteCurso({{ $curso->id }})" 
                            onclick="confirm('Tem certeza que deseja deletar este curso?')" ><i class="bi bi-trash"></i></button>
                     </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhum curso encontrado.</td>
                </tr>
            @endforelse
        </table>
        
    </div>

    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Adicionar Novo Curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <form wire:submit.prevent="{{ $editMode ? 'updateCurso' : 'addcurso' }}" id="addCourseForm">
                        @csrf
                        <div class="mb-3">
                            <label for="courseName" class="form-label">Nome do Curso</label>
                            <input type="text" class="form-control" id="courseName" wire:model="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="courseDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="courseDescription" wire:model="descricao" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="courseContent" class="form-label">Conteúdo Programático</label>
                            <textarea class="form-control" id="courseContent" wire:model="conteudo" rows="5" placeholder="Digite cada tópico do conteúdo em uma nova linha" required></textarea>
                        </div>

                        <div class="row">
                            <div class="mb-3 col">
                                <label for="courseDuration" class="form-label">Duração</label>
                                <input type="text" class="form-control" id="courseDuration" wire:model="duracao" placeholder="Ex: 30 horas" required>
                            </div>
                            <div class="mb-3 col">
                                <label for="turma" class="form-label">Próxima Turma</label>
                                <input type="date" class="form-control @error('turma') is-invalid @enderror" wire:model='turma' id="turma" name="turma" value="{{ old('turma') }}">
                                @error('turma')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="coursePrice" class="form-label">Preço</label>
                                <input type="text" class="form-control" id="coursePrice" wire:model="preco" placeholder="Ex: 185.000 kzs" required>
                            </div>
                            <div class="mb-3 col">
                                <label for="courseModality" class="form-label">Modalidade</label>
                                <select class="form-select" id="courseModality" wire:model="modalidade" required>
                                    <option value="">Selecione a modalidade</option>
                                    <option value="presencial">Presencial</option>
                                    <option value="online">Online</option>
                                    <option value="hibrido">Híbrido</option>
                                </select>
                            </div>
                        </div>
                       
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="cancelEdit">Cancelar</button>
                            <button type="submit" class="btn btn-primary"  id="">
                                {{ $editMode ? 'Salvar Alterações' : 'Salvar Curso' }}
                            </button>
                        </div>
                       
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    
  
</div>