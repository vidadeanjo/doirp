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
            <div class="col-md-5 mb-2">
                <input type="search" class="form-control" id="searchService" placeholder="Pesquisar serviços..."
                    wire:model.debounce.500ms="searchTerm">
            </div>
            <div class="col-md-5 text-end mb-2">
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
                @forelse ($serviconews as $serviconew)
                <tr>
                    <td>{{ $serviconew->nome }}</td>
                    <td class="description">{{ Str::limit($serviconew->descricao, 100) }}</td>
                    <td>{{ $serviconew->categoria ?? 'Sem Categoria' }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-2" 
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
                    <h5 class="modal-title" id="addServiceModalLabel">
                        <span id="modalTitle">Adicionar Novo Serviço</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="serviceForm">
                        @csrf
                        <input type="hidden" id="serviceId" value="">
                        <input type="hidden" id="isEdit" value="false">
                        
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="serviceName" required>
                            <div class="invalid-feedback" id="nomeError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="serviceDescription" rows="3"></textarea>
                            <div class="invalid-feedback" id="descricaoError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="serviceCategory" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="serviceCategory" 
                                   placeholder="Ex: Desenvolvimento, Consultoria, Suporte...">
                            <div class="invalid-feedback" id="categoriaError"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="saveServiceBtn">
                                Salvar Serviço
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
    modal = new bootstrap.Modal(document.getElementById('addServiceModal'));
    
    // Form submission
    document.getElementById('serviceForm').addEventListener('submit', function(e) {
        e.preventDefault();
        if (isProcessing) return;
        
        saveService();
    });
    
    // Reset form when modal closes
    document.getElementById('addServiceModal').addEventListener('hidden.bs.modal', function () {
        resetForm();
    });
    
    // Auto-hide flash messages
    setTimeout(() => {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 5000);
});

function openModal() {
    resetForm();
    document.getElementById('modalTitle').textContent = 'Adicionar Novo Serviço';
    document.getElementById('saveServiceBtn').textContent = 'Salvar Serviço';
    modal.show();
}

function editService(id, nome, descricao, categoria) {
    resetForm();
    
    document.getElementById('serviceId').value = id;
    document.getElementById('isEdit').value = 'true';
    document.getElementById('serviceName').value = nome || '';
    document.getElementById('serviceDescription').value = descricao || '';
    document.getElementById('serviceCategory').value = categoria || '';
    
    document.getElementById('modalTitle').textContent = 'Editar Serviço';
    document.getElementById('saveServiceBtn').textContent = 'Salvar Alterações';
    
    modal.show();
}

function resetForm() {
    document.getElementById('serviceForm').reset();
    document.getElementById('serviceId').value = '';
    document.getElementById('isEdit').value = 'false';
    
    // Remove validation classes
    const inputs = document.querySelectorAll('#serviceForm .form-control');
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
    
    const formData = {
        id: document.getElementById('serviceId').value,
        nome: document.getElementById('serviceName').value,
        descricao: document.getElementById('serviceDescription').value,
        categoria: document.getElementById('serviceCategory').value,
        isEdit: document.getElementById('isEdit').value === 'true'
    };
    
    // Clear previous errors
    resetValidation();
    
    // Basic validation
    if (!formData.nome.trim()) {
        showError('serviceName', 'nomeError', 'O nome é obrigatório');
        isProcessing = false;
        return;
    }
    
    // Call Livewire method
    if (formData.isEdit) {
        @this.call('updateServiconew', formData.id, formData.nome, formData.descricao, formData.categoria)
            .then(() => {
                modal.hide();
                isProcessing = false;
            })
            .catch(() => {
                isProcessing = false;
            });
    } else {
        @this.call('createServiconew', formData.nome, formData.descricao, formData.categoria)
            .then(() => {
                modal.hide();
                isProcessing = false;
            })
            .catch(() => {
                isProcessing = false;
            });
    }
}

function deleteService(id) {
    if (confirm('Tem certeza que deseja deletar este serviço?')) {
        @this.call('deleteServiconew', id);
    }
}

function resetValidation() {
    const inputs = document.querySelectorAll('#serviceForm .form-control');
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
</script>
