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
            <div class="col-md-6 mb-2">
                <input type="search" class="form-control" placeholder="Pesquisar serviços..."
                    wire:model.live="searchTerm">
            </div>
            <div class="col-md-6 text-end mb-2">
                <button class="btn btn-primary" onclick="openModal()">
                    <i class="bi bi-plus-circle me-2"></i>Novo Serviço
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
                        <th>Categoria</th>
                        <th>Data Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($serviconews as $serviconew)
                    <tr>
                        <td><strong>{{ $serviconew->nome }}</strong></td>
                        <td>{{ Str::limit($serviconew->descricao, 100) }}</td>
                        <td>
                            @if($serviconew->categoria)
                                <span class="badge bg-{{ $serviconew->categoria == 'Formação e Consultoria' ? 'primary' : ($serviconew->categoria == 'Desenvolvimento de Softwares' ? 'success' : 'warning') }}">
                                    {{ $serviconew->categoria }}
                                </span>
                            @else
                                <span class="text-muted">Sem Categoria</span>
                            @endif
                        </td>
                        <td>{{ $serviconew->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-1" 
                                onclick="editService({{ $serviconew->id }}, '{{ addslashes($serviconew->nome) }}', '{{ addslashes($serviconew->descricao) }}', '{{ addslashes($serviconew->categoria) }}')">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" 
                                onclick="deleteService({{ $serviconew->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="bi bi-inbox fs-1 text-muted"></i>
                            <p class="text-muted mt-2">Nenhum serviço encontrado.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de Serviço -->
    <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="serviceModalLabel">
                        <span id="modalTitle">Adicionar Novo Serviço</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="serviceForm">
                        @csrf
                        <input type="hidden" id="serviceId" value="">
                        <input type="hidden" id="isEdit" value="false">
                        
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="serviceName" class="form-label">Nome do Serviço *</label>
                                <input type="text" class="form-control" id="serviceName" required>
                                <div class="invalid-feedback" id="nomeError"></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="serviceCategory" class="form-label">Categoria</label>
                                <select class="form-select" id="serviceCategory">
                                    <option value="">Selecione uma categoria...</option>
                                    <option value="Formação e Consultoria">Formação e Consultoria</option>
                                    <option value="Desenvolvimento de Softwares">Desenvolvimento de Softwares</option>
                                    <option value="Manutenção e Network">Manutenção e Network</option>
                                </select>
                                <div class="invalid-feedback" id="categoriaError"></div>
                                <div class="form-text">Ou digite uma nova categoria abaixo</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="serviceCategoryCustom" class="form-label">Nova Categoria (opcional)</label>
                                <input type="text" class="form-control" id="serviceCategoryCustom" 
                                    placeholder="Digite uma nova categoria...">
                                <div class="form-text">Se preenchido, será usado no lugar da categoria selecionada acima</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="serviceDescription" rows="4" 
                                placeholder="Descreva detalhadamente o serviço oferecido..."></textarea>
                            <div class="invalid-feedback" id="descricaoError"></div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="saveServiceBtn">
                                <i class="bi bi-check-circle me-2"></i>Salvar Serviço
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
    modal = new bootstrap.Modal(document.getElementById('serviceModal'));
    
    // Form submission
    document.getElementById('serviceForm').addEventListener('submit', function(e) {
        e.preventDefault();
        if (isProcessing) return;
        
        saveService();
    });
    
    // Reset form when modal closes
    document.getElementById('serviceModal').addEventListener('hidden.bs.modal', function () {
        resetForm();
    });

    // Handle category selection
    document.getElementById('serviceCategory').addEventListener('change', function() {
        const customInput = document.getElementById('serviceCategoryCustom');
        if (this.value) {
            customInput.value = '';
            customInput.placeholder = 'Ou digite uma nova categoria...';
        }
    });

    document.getElementById('serviceCategoryCustom').addEventListener('input', function() {
        const selectInput = document.getElementById('serviceCategory');
        if (this.value.trim()) {
            selectInput.value = '';
        }
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
    document.getElementById('modalTitle').textContent = 'Adicionar Novo Serviço';
    document.getElementById('saveServiceBtn').innerHTML = '<i class="bi bi-check-circle me-2"></i>Salvar Serviço';
    modal.show();
}

function editService(id, nome, descricao, categoria) {
    resetForm();
    
    document.getElementById('serviceId').value = id;
    document.getElementById('isEdit').value = 'true';
    document.getElementById('serviceName').value = nome || '';
    document.getElementById('serviceDescription').value = descricao || '';
    
    // Handle category - check if it's a predefined one or custom
    const categorySelect = document.getElementById('serviceCategory');
    const categoryCustom = document.getElementById('serviceCategoryCustom');
    
    const predefinedCategories = ['Formação e Consultoria', 'Desenvolvimento de Softwares', 'Manutenção e Network'];
    
    if (categoria && predefinedCategories.includes(categoria)) {
        categorySelect.value = categoria;
        categoryCustom.value = '';
    } else {
        categorySelect.value = '';
        categoryCustom.value = categoria || '';
    }
    
    document.getElementById('modalTitle').textContent = 'Editar Serviço';
    document.getElementById('saveServiceBtn').innerHTML = '<i class="bi bi-check-circle me-2"></i>Salvar Alterações';
    
    modal.show();
}

function resetForm() {
    document.getElementById('serviceForm').reset();
    document.getElementById('serviceId').value = '';
    document.getElementById('isEdit').value = 'false';
    
    // Remove validation classes
    const inputs = document.querySelectorAll('#serviceForm .form-control, #serviceForm .form-select');
    inputs.forEach(input => {
        input.classList.remove('is-invalid');
    });
    
    // Clear error messages
    document.querySelectorAll('.invalid-feedback').forEach(error => {
        error.textContent = '';
    });
}

function saveService() {
    if (isProcessing) return;
    isProcessing = true;
    
    // Determine final category
    const categorySelect = document.getElementById('serviceCategory').value;
    const categoryCustom = document.getElementById('serviceCategoryCustom').value.trim();
    const finalCategory = categoryCustom || categorySelect || null;
    
    const formData = {
        id: document.getElementById('serviceId').value,
        nome: document.getElementById('serviceName').value,
        descricao: document.getElementById('serviceDescription').value,
        categoria: finalCategory,
        isEdit: document.getElementById('isEdit').value === 'true'
    };
    
    // Clear previous errors
    resetValidation();
    
    // Basic validation
    if (!formData.nome.trim()) {
        showError('serviceName', 'nomeError', 'O nome do serviço é obrigatório');
        isProcessing = false;
        return;
    }
    
    // Update button state
    const btn = document.getElementById('saveServiceBtn');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Salvando...';
    btn.disabled = true;
    
    // Call Livewire method
    if (formData.isEdit) {
        @this.call('updateServiconew', formData.id, formData.nome, formData.descricao, formData.categoria)
            .then(() => {
                modal.hide();
                resetProcessing(btn, originalText);
            })
            .catch(() => {
                resetProcessing(btn, originalText);
            });
    } else {
        @this.call('createServiconew', formData.nome, formData.descricao, formData.categoria)
            .then(() => {
                modal.hide();
                resetProcessing(btn, originalText);
            })
            .catch(() => {
                resetProcessing(btn, originalText);
            });
    }
}

function deleteService(id) {
    if (confirm('Tem certeza que deseja deletar este serviço? Esta ação não pode ser desfeita.')) {
        @this.call('deleteServiconew', id);
    }
}

function resetProcessing(btn, originalText) {
    btn.innerHTML = originalText;
    btn.disabled = false;
    isProcessing = false;
}

function resetValidation() {
    const inputs = document.querySelectorAll('#serviceForm .form-control, #serviceForm .form-select');
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
