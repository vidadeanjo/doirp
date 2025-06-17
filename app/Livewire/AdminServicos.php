<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Servico;
use Livewire\Component;

class AdminServicos extends Component
{
    public $servicos;
    public  $categorias;
    public $nome;
    public $descricao;
    public $categoriaId;
    public $servicoId;
    public $isEditMode = false;
    public $searchTerm = '';

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->refreshServicos();
    }

    public function updatedSearchTerm()
    {
        $this->refreshServicos();
    }

    public function refreshServicos()
    {
        $this->servicos = Servico::with('categoria')
            ->when($this->searchTerm, function ($query) {
                $query->where('nome', 'like', '%' . $this->searchTerm . '%')
                      ->orWhereHas('categoria', function ($subQuery) {
                          $subQuery->where('nome', 'like', '%' . $this->searchTerm . '%');
                      });
            })
            ->get();
    }

    public function resetForm()
    {
        $this->nome = '';
        $this->descricao = '';
        $this->categoriaId = '';
        $this->servicoId = null;
        $this->isEditMode = false;
    }

    public function createServico()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'categoriaId' => 'nullable|exists:categorias,id',
        ]);

        Servico::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoriaId' => $this->categoriaId ?: null,
        ]);

        session()->flash('message', 'Serviço criado com sucesso!');
        $this->resetForm();
        $this->refreshServicos();
    }

    public function editServico($id)
    {
        $servico = Servico::findOrFail($id);
        $this->servicoId = $servico->id;
        $this->nome = $servico->nome;
        $this->descricao = $servico->descricao;
        $this->categoriaId = $servico->categoriaId;
        $this->isEditMode = true;
    }

    public function updateServico()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'categoriaId' => 'nullable|exists:categorias,id',
        ]);

        $servico = Servico::findOrFail($this->servicoId);
        $servico->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoriaId' => $this->categoriaId ?: null,
        ]);

        session()->flash('message', 'Serviço atualizado com sucesso!');
        $this->resetForm();
        $this->refreshServicos();
    }

    public function deleteServico($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        session()->flash('message', 'Serviço deletado com sucesso!');
        $this->refreshServicos();
    }

    public function render()
    {
        return view('livewire.admin-servicos');
    }
}
