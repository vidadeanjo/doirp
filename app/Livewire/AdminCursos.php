<?php

namespace App\Livewire;

use App\Models\curso;
use Livewire\Component;

class AdminCursos extends Component
{
    public $cursos;
    public $search = '';

    public function mount()
    {
        $this->refreshCursos();
    }

    public function updatedSearch()
    {
        $this->refreshCursos();
    }

    public function refreshCursos()
    {
        $query = curso::query();
        
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('nome', 'like', $searchTerm)
                  ->orWhere('descricao', 'like', $searchTerm)
                  ->orWhere('modalidade', 'like', $searchTerm);
            });
        }
        
        $this->cursos = $query->orderBy('created_at', 'desc')->get();
    }

    public function toggleDestaque($cursoId)
    {
        try {
            $curso = curso::findOrFail($cursoId);
            $curso->destaque = !$curso->destaque;
            $curso->save();
            
            $this->refreshCursos();
            session()->flash('message', 'Status de destaque atualizado com sucesso!');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao atualizar destaque: ' . $e->getMessage());
        }
    }

    public function createCurso($nome, $descricao = null, $conteudo = null, $duracao = null, $preco = null, $modalidade = null, $turma = null)
    {
        try {
            // Validação manual para compatibilidade com JavaScript
            if (empty($nome)) {
                throw new \Exception('O nome do curso é obrigatório');
            }
            if (empty($duracao)) {
                throw new \Exception('A duração é obrigatória');
            }
            if (empty($preco) || !is_numeric($preco)) {
                throw new \Exception('O preço deve ser um valor numérico válido');
            }
            if (empty($modalidade)) {
                throw new \Exception('A modalidade é obrigatória');
            }

            curso::create([
                'nome' => trim($nome),
                'descricao' => $descricao ? trim($descricao) : null,
                'conteudo' => $conteudo ? trim($conteudo) : null,
                'duracao' => trim($duracao),
                'preco' => floatval($preco),
                'modalidade' => $modalidade,
                'turma' => $turma ?: null,
                'destaque' => false
            ]);

            session()->flash('message', 'Curso criado com sucesso!');
            $this->refreshCursos();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao criar curso: ' . $e->getMessage());
        }
    }

    public function updateCurso($id, $nome, $descricao = null, $conteudo = null, $duracao = null, $preco = null, $modalidade = null, $turma = null)
    {
        try {
            // Validação manual
            if (empty($nome)) {
                throw new \Exception('O nome do curso é obrigatório');
            }
            if (empty($duracao)) {
                throw new \Exception('A duração é obrigatória');
            }
            if (empty($preco) || !is_numeric($preco)) {
                throw new \Exception('O preço deve ser um valor numérico válido');
            }
            if (empty($modalidade)) {
                throw new \Exception('A modalidade é obrigatória');
            }

            $curso = curso::findOrFail($id);
            $curso->update([
                'nome' => trim($nome),
                'descricao' => $descricao ? trim($descricao) : null,
                'conteudo' => $conteudo ? trim($conteudo) : null,
                'duracao' => trim($duracao),
                'preco' => floatval($preco),
                'modalidade' => $modalidade,
                'turma' => $turma ?: null,
            ]);

            session()->flash('message', 'Curso atualizado com sucesso!');
            $this->refreshCursos();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao atualizar curso: ' . $e->getMessage());
        }
    }

    public function deleteCurso($id)
    {
        try {
            $curso = curso::find($id);
            
            if (!$curso) {
                session()->flash('error', 'Curso não encontrado.');
                $this->refreshCursos();
                return;
            }
            
            $curso->delete();
            session()->flash('message', 'Curso deletado com sucesso!');
            $this->refreshCursos();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao deletar curso: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin-cursos');
    }
}
