<?php

namespace App\Livewire;

use App\Models\curso;
use Livewire\Component;

class InicioIn extends Component
{
    public $cursosDestaque;
    public function mount(){
        
        $this->cursosDestaque = curso::where('destaque', true)->get();
    
    }
    public function render()
    {
        return view('livewire.inicio-in');
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
