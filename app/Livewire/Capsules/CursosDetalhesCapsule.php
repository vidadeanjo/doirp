<?php

namespace App\Livewire\Capsules;

use App\Models\curso;
use Livewire\Component;

class CursosDetalhesCapsule extends Component
{
    public $curso =7;
    public function mount($id)
    {
        $this->curso = Curso::find($id);

        if (!$this->curso) {
            abort(404, 'Curso não encontrado.');
        }
    }
    public function render()
    {

        return view('livewire.capsules.cursos-detalhes-capsule', compact('curso'));
    }
} 
