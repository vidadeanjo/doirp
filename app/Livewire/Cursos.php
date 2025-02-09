<?php

namespace App\Livewire;

use App\Models\curso;
use Livewire\Component;

class Cursos extends Component
{
    public $cursos;
    public $searchTerm = ''; // Campo para o termo de busca

    
       
   
    public function render()
    {
          // Carrega os cursos ao iniciar
          $this->refreshCursos();
        return view('livewire.cursos');
    }
   
    // Atualiza a lista de cursos com base no termo de busca
    public function refreshCursos()
    {
        $this->cursos = Curso::when($this->searchTerm, function ($query) {
            $query->where('nome', 'like', '%' . $this->searchTerm . '%');
                })->get();
    }
    
    public function detalhesCurso($id)
    {
        // Validar e buscar o curso
        $curso = Curso::find($id);

        if (!$curso) {
            session()->flash('error', 'Curso não encontrado.');
            return;
        }
        

        // Redirecionar para a página de detalhes
        return redirect()->route('curso-detalhe', ['id' => $id]);
    }
}
