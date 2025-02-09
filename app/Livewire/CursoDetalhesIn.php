<?php

namespace App\Livewire;

use App\Models\curso;
use Livewire\Component;

class CursoDetalhesIn extends Component
{
    public $curso, $cursoid;

    public function mount ($id){
        $curso = curso::findOrFail($id);
        $this->curso = $curso;
    }

    public function render()
    {
        return view('livewire.curso-detalhes-in');
    }
}
