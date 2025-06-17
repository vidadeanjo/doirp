<?php

namespace App\Livewire;

use App\Models\Serviconew;
use Livewire\Component;

class AdminServiconews extends Component
{
    public $serviconews;
    public $nome, $descricao, $categoria, $serviconewId;
    public $isEditMode = false;
    public $searchTerm = '';

    public function mount()
    {
        $this->refreshServiconews();
    }

    public function updatedSearchTerm()
    {
        $this->refreshServiconews();
    }

    public function refreshServiconews()
    {
        $this->serviconews = Serviconew::query()
            ->when($this->searchTerm, function ($query) {
                $query->where('nome', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('categoria', 'like', '%' . $this->searchTerm . '%');
            })
            ->get();
    }

    public function resetForm()
    {
        $this->nome = '';
        $this->descricao = '';
        $this->categoria = '';
        $this->serviconewId = null;
        $this->isEditMode = false;
    }

    public function createServiconew()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'categoria' => 'nullable|string|max:255',
        ]);

        Serviconew::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoria' => $this->categoria,
        ]);

        session()->flash('message', 'Serviço Novo criado com sucesso!');
        $this->resetForm();
        $this->refreshServiconews();
    }

    public function editServiconew($id)
    {
        $serviconew = Serviconew::findOrFail($id);
        $this->serviconewId = $serviconew->id;
        $this->nome = $serviconew->nome;
        $this->descricao = $serviconew->descricao;
        $this->categoria = $serviconew->categoria;
        $this->isEditMode = true;
    }

    public function updateServiconew()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'categoria' => 'nullable|string|max:255',
        ]);

        $serviconew = Serviconew::findOrFail($this->serviconewId);
        $serviconew->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoria' => $this->categoria,
        ]);

        session()->flash('message', 'Serviço Novo atualizado com sucesso!');
        $this->resetForm();
        $this->refreshServiconews();
    }

    public function deleteServiconew($id)
    {
        $serviconew = Serviconew::findOrFail($id);
        $serviconew->delete();

        session()->flash('message', 'Serviço Novo deletado com sucesso!');
        $this->refreshServiconews();
    }

    public function render()
    {
        return view('livewire.admin-serviconews');
    }
}
