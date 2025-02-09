<?php

namespace App\Livewire;

use App\Models\categoria;
use Livewire\Component;

class Categorias extends Component
{
    public $categorias;
    public $nome,$descricao, $categoriaId;
    public $isEditMode = false;
    public $searchTerm = '';

    public function mount()
    {
        $this->refreshCategorias();
    }

    public function refreshCategorias()
    {
        $this->categorias = Categoria::query()
        ->when($this->searchTerm, function ($query) {
            $query->where('nome', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('descricao', 'like', '%' . $this->searchTerm . '%');
        })
        ->get();
    }

    public function resetForm()
    {
        $this->nome = '';
        $this->descricao = '';
        $this->categoriaId = null;
        $this->isEditMode = false;
    }

    public function createCategoria()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
        ]);

        Categoria::create(['nome' => $this->nome, 'descricao' => $this->descricao]);

        session()->flash('message', 'Categoria criada com sucesso!');
        $this->resetForm();
        $this->refreshCategorias();
        redirect(route('admin-servicos-categorias'));
    }

    public function editCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoriaId = $categoria->id;
        $this->nome = $categoria->nome;
        $this->descricao = $categoria->descricao;
        $this->isEditMode = true;
    }

    public function updateCategoria()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' =>'required|string|max:255' ,
        ]);

        $categoria = Categoria::findOrFail($this->categoriaId);
        $categoria->update(['nome' => $this->nome, 'descricao' => $this->descricao]);

        session()->flash('message', 'Categoria atualizada com sucesso!');
        $this->resetForm();
        $this->refreshCategorias();
        redirect(route('admin-servicos-categorias'));
    }

    public function deleteCategoria($id)
    {
        $categoria = categoria::findOrFail($id);
        $categoria->delete();

        session()->flash('message', 'Categoria deletada com sucesso!');
        $this->refreshCategorias();
    }

    public function render()
    {
        return view('livewire.categorias');
    }
}
