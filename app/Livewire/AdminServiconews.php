<?php

namespace App\Livewire;

use App\Models\Serviconew;
use Livewire\Component;

class AdminServiconews extends Component
{
    public $serviconews;
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
        $query = Serviconew::query();
        
        if (!empty($this->searchTerm)) {
            $searchTerm = '%' . $this->searchTerm . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('nome', 'ilike', $searchTerm)
                  ->orWhere('categoria', 'ilike', $searchTerm)
                  ->orWhere('descricao', 'ilike', $searchTerm);
            });
        }
        
        $this->serviconews = $query->orderBy('created_at', 'desc')->get();
    }

    public function createServiconew($nome, $descricao = null, $categoria = null)
    {
        try {
            $this->validate([
                'nome' => 'required|string|max:255',
            ], [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'O nome não pode ter mais de 255 caracteres',
            ], [
                'nome' => $nome,
            ]);

            Serviconew::create([
                'nome' => trim($nome),
                'descricao' => $descricao ? trim($descricao) : null,
                'categoria' => $categoria ? trim($categoria) : null,
            ]);

            session()->flash('message', 'Serviço criado com sucesso!');
            $this->refreshServiconews();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao criar serviço: ' . $e->getMessage());
        }
    }

    public function updateServiconew($id, $nome, $descricao = null, $categoria = null)
    {
        try {
            $this->validate([
                'nome' => 'required|string|max:255',
            ], [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'O nome não pode ter mais de 255 caracteres',
            ], [
                'nome' => $nome,
            ]);

            $serviconew = Serviconew::findOrFail($id);
            $serviconew->update([
                'nome' => trim($nome),
                'descricao' => $descricao ? trim($descricao) : null,
                'categoria' => $categoria ? trim($categoria) : null,
            ]);

            session()->flash('message', 'Serviço atualizado com sucesso!');
            $this->refreshServiconews();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao atualizar serviço: ' . $e->getMessage());
        }
    }

    public function deleteServiconew($id)
    {
        try {
            $serviconew = Serviconew::find($id);
            
            if (!$serviconew) {
                session()->flash('error', 'Serviço não encontrado.');
                $this->refreshServiconews();
                return;
            }
            
            $serviconew->delete();
            session()->flash('message', 'Serviço deletado com sucesso!');
            $this->refreshServiconews();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao deletar serviço: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin-serviconews')
            ->extends('livewire.priod')
            ->section('content');
    }
}
