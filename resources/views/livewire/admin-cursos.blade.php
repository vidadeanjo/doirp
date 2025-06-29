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

        <h1 class="mb-4">Gerenciar Cursos</h1>
        
        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <input type="search" class="form-control" placeholder="Pesquisar cursos..."
                    wire:model.live="search">
            </div>
            <div class="col-md-6 text-end mb-2">
                <button class="btn btn-primary" onclick="openModal()">
                    <i class="bi bi-plus-circle me-2"></i>Novo Curso
                </button>
            </div>
        </div>

        @if (session()->has('message'))
        <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('error'))
        <div id="flash-error" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Duração</th>
                        <th>Preço</th>
                        <th>Destaque</th>
                        <th>Modalidade</th>
                        <th>Próxima Turma</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cursos as $curso)
                    <tr>
                        <td><strong>{{ $curso->nome }}</strong></td>
                        <td>{{ Str::limit($curso->descricao, 80) }}</td>
                        <td>{{ $curso->duracao }}</td>
                        <td>{{ number_format($curso->preco, 0, ',', '.') }} Kz</td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" 
                                    wire:click="toggleDestaque({{ $curso->id }})"
                                    {{ $curso->destaque ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $curso->destaque ? 'Sim' : 'Não' }}
                                </label>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-{{ $curso->modalidade == 'presencial' ? 'primary' : ($curso->modalidade == 'online' ? 'success' : 'warning') }}">
                                {{ ucfirst($curso->modalidade) }}
                            </span>
                        </td>
                        <td>{{ $curso->turma ? \Carbon\Carbon::parse($curso->turma)->format('d/m/Y') : 'Não definida' }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-1" 
                                onclick="editCourse({{ $curso->id }}, '{{ addslashes($curso->nome) }}', '{{ addslashes($curso->descricao) }}', '{{ addslashes($curso->conteudo) }}', '{{ addslashes($curso->duracao) }}', {{ $curso->preco }}, '{{ $curso->modalidade }}', '{{ $curso->turma }}')">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" 
                                onclick="deleteCourse({{ $curso->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="bi bi-inbox fs-1 text-muted"></i>
                            <p class="text-muted mt-2">Nenhum curso encontrado.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de Curso -->
    <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="courseModalLabel">
                        <span id="modalTitle">Adicionar Novo Curso</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="courseForm">
                        @csrf
                        <input type="hidden" id="courseId" value="">
                        <input type="hidden" id="isEdit" value="false">
                        
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="courseName" class="form-label">Nome do Curso *</label>
                                <input type="text" class="form-control" id="courseName" required>
                                <div class="invalid-feedback" id="nomeError"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="courseModality" class="form-label">Modalidade *</label>
                                <select class="form-select" id="courseModality" required>
                                    <option value="">Selecione...</option>
                                    <option value="presencial">Presencial</option>
                                    <option value="online">Online</option>
                                    <option value="hibrido">Híbrido</option>
                                </select>
                                <div class="invalid-feedback" id="modalidadeError"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="courseDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="courseDescription" rows="3" 
                                placeholder="Breve descrição do curso..."></textarea>
                            <div class="invalid-feedback" id="descricaoError"></div>
                        </div>

                        <div class="mb-3">
                            <label for="courseContent" class="form-label">Conteúdo Programático</label>
                            <textarea class="form-control" id="courseContent" rows="4" 
                                placeholder="Digite cada tópico do conteúdo em uma nova linha..."></textarea>
                            <div class="invalid-feedback" id="conteudoError"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="courseDuration" class="form-label">Duração *</label>
                                <input type="text" class="form-control" id="courseDuration" 
                                    placeholder="Ex: 30 horas" required>
                                <div class="invalid-feedback" id="duracaoError"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="coursePrice" class="form-label">Preço (Kz) *</label>
                                <input type="number" class="form-control" id="coursePrice" 
                                    placeholder="185000" min="0" step="0.01" required>
                                <div class="invalid-feedback" id="precoError"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="courseTurma" class="form-label">Próxima Turma</label>
                                <input type="date" class="form-control" id="courseTurma">
                                <div class="invalid-feedback" id="turmaError"></div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="saveCourseBtn">
                                <i class="bi bi-check-circle me-2"></i>Salvar Curso
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let modal;
let isProcessing = false;

document.addEventListener('DOMContentLoaded', function() {
    modal = new bootstrap.Modal(document.getElementById('courseModal'));
    
    // Form submission
    document.getElementById('courseForm').addEventListener('submit', function(e) {
        e.preventDefault();
        if (isProcessing) return;
        
        saveCourse();
    });
    
    // Reset form when modal closes
    document.getElementById('courseModal').addEventListener('hidden.bs.modal', function () {
        resetForm();
    });
    
    // Auto-hide flash messages
    setTimeout(() => {
        const flashMessage = document.getElementById('flash-message');
        const flashError = document.getElementById('flash-error');
        if (flashMessage) flashMessage.style.display = 'none';
        if (flashError) flashError.style.display = 'none';
    }, 5000);
});

function openModal() {
    resetForm();
    document.getElementById('modalTitle').textContent = 'Adicionar Novo Curso';
    document.getElementById('saveCourseBtn').innerHTML = '<i class="bi bi-check-circle me-2"></i>Salvar Curso';
    modal.show();
}

function editCourse(id, nome, descricao, conteudo, duracao, preco, modalidade, turma) {
    resetForm();
    
    document.getElementById('courseId').value = id;
    document.getElementById('isEdit').value = 'true';
    document.getElementById('courseName').value = nome || '';
    document.getElementById('courseDescription').value = descricao || '';
    document.getElementById('courseContent').value = conteudo || '';
    document.getElementById('courseDuration').value = duracao || '';
    document.getElementById('coursePrice').value = preco || '';
    document.getElementById('courseModality').value = modalidade || '';
    document.getElementById('courseTurma').value = turma || '';
    
    document.getElementById('modalTitle').textContent = 'Editar Curso';
    document.getElementById('saveCourseBtn').innerHTML = '<i class="bi bi-check-circle me-2"></i>Salvar Alterações';
    
    modal.show();
}

function resetForm() {
    document.getElementById('courseForm').reset();
    document.getElementById('courseId').value = '';
    document.getElementById('isEdit').value = 'false';
    
    // Remove validation classes
    const inputs = document.querySelectorAll('#courseForm .form-control, #courseForm .form-select');
    inputs.forEach(input => {
        input.classList.remove('is-invalid');
    });
    
    // Clear error messages
    document.querySelectorAll('.invalid-feedback').forEach(error => {
        error.textContent = '';
    });
}

function saveCourse() {
    if (isProcessing) return;
    isProcessing = true;
    
    const formData = {
        id: document.getElementById('courseId').value,
        nome: document.getElementById('courseName').value,
        descricao: document.getElementById('courseDescription').value,
        conteudo: document.getElementById('courseContent').value,
        duracao: document.getElementById('courseDuration').value,
        preco: document.getElementById('coursePrice').value,
        modalidade: document.getElementById('courseModality').value,
        turma: document.getElementById('courseTurma').value,
        isEdit: document.getElementById('isEdit').value === 'true'
    };
    
    // Clear previous errors
    resetValidation();
    
    // Basic validation
    if (!formData.nome.trim()) {
        showError('courseName', 'nomeError', 'O nome do curso é obrigatório');
        isProcessing = false;
        return;
    }
    
    if (!formData.duracao.trim()) {
        showError('courseDuration', 'duracaoError', 'A duração é obrigatória');
        isProcessing = false;
        return;
    }
    
    if (!formData.preco || isNaN(formData.preco)) {
        showError('coursePrice', 'precoError', 'O preço deve ser um valor numérico válido');
        isProcessing = false;
        return;
    }
    
    if (!formData.modalidade) {
        showError('courseModality', 'modalidadeError', 'A modalidade é obrigatória');
        isProcessing = false;
        return;
    }
    
    // Update button state
    const btn = document.getElementById('saveCourseBtn');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Salvando...';
    btn.disabled = true;
    
    // Call Livewire method
    if (formData.isEdit) {
        @this.call('updateCurso', formData.id, formData.nome, formData.descricao, formData.conteudo, formData.duracao, formData.preco, formData.modalidade, formData.turma)
            .then(() => {
                modal.hide();
                resetProcessing(btn, originalText);
            })
            .catch(() => {
                resetProcessing(btn, originalText);
            });
    } else {
        @this.call('createCurso', formData.nome, formData.descricao, formData.conteudo, formData.duracao, formData.preco, formData.modalidade, formData.turma)
            .then(() => {
                modal.hide();
                resetProcessing(btn, originalText);
            })
            .catch(() => {
                resetProcessing(btn, originalText);
            });
    }
}

function deleteCourse(id) {
    if (confirm('Tem certeza que deseja deletar este curso? Esta ação não pode ser desfeita.')) {
        @this.call('deleteCurso', id);
    }
}

function resetProcessing(btn, originalText) {
    btn.innerHTML = originalText;
    btn.disabled = false;
    isProcessing = false;
}

function resetValidation() {
    const inputs = document.querySelectorAll('#courseForm .form-control, #courseForm .form-select');
    inputs.forEach(input => {
        input.classList.remove('is-invalid');
    });
    
    document.querySelectorAll('.invalid-feedback').forEach(error => {
        error.textContent = '';
    });
}

function showError(inputId, errorId, message) {
    document.getElementById(inputId).classList.add('is-invalid');
    document.getElementById(errorId).textContent = message;
}

// CSS para animação
const style = document.createElement('style');
style.textContent = `
    .spin {
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .table-responsive {
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .badge {
        font-size: 0.75em;
    }
`;
document.head.appendChild(style);
</script>
