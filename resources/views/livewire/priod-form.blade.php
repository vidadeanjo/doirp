<div class="container mt-4">
 

    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin') }}">Painel Admin</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Informações gerais</li>
            </ol>
        </nav>
    </div>

    <h1 class="mb-4">Informações Gerais</h1>

  
    <form wire:submit.prevent="save">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email" 
                   @if(!$isEditable) disabled @endif>
        </div>
        <div class="mb-3">
            <label for="contacto_1" class="form-label">Contacto</label>
            <input type="tel" class="form-control" id="contacto" wire:model="contacto" 
                   @if(!$isEditable) disabled @endif>
        </div>
        <div class="mb-3">
            <label for="whatsapp" class="form-label">WhatsApp</label>
            <input type="tel" class="form-control" id="whatsapp" wire:model="whatsapp" 
                   @if(!$isEditable) disabled @endif>
        </div>
        <div class="mb-3">
            <label for="facebook_link" class="form-label">Link do Facebook</label>
            <input type="url" class="form-control" id="facebook_link" wire:model="facebook_link" 
                   @if(!$isEditable) disabled @endif>
        </div>
        <div class="mb-3">
            <label for="instagram_link" class="form-label">Link do Instagram</label>
            <input type="url" class="form-control" id="instagram_link" wire:model="instagram_link" 
                   @if(!$isEditable) disabled @endif>
        </div>
        <div class="mb-3">
            <label for="linkedin_link" class="form-label">Link do LinkedIn</label>
            <input type="url" class="form-control" id="linkedin_link" wire:model="linkedin_link" 
                   @if(!$isEditable) disabled @endif>
        </div>
        <div class="mb-3">
            <label for="missao" class="form-label">Missão</label>
            <textarea class="form-control" id="missao" wire:model="missao" rows="3" 
                      @if(!$isEditable) disabled @endif></textarea>
        </div>
        <div class="mb-3">
            <label for="visao" class="form-label">Visão</label>
            <textarea class="form-control" id="visao" wire:model="visao" rows="3" 
                      @if(!$isEditable) disabled @endif></textarea>
        </div>

        <div class="mb-3">
            @if($isEditable)
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            @else
                <button type="button" class="btn btn-secondary" wire:click="enableEdit">Ativar Edição</button>
            @endif
        </div>
    </form>
</div>
