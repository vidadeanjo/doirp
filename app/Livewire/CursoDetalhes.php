<?php

namespace App\Livewire;

use App\Models\curso;
use Livewire\Component;

class CursoDetalhes extends Component
{
    public $curso, $cursoid;

    public function mount($id){
       //// $curso = curso::findOrFail($id);
      $this->cursoid = $id;
    }
  
    public function render()
    {
     // $curso = curso::findOrFail($id);
       // $this->curso = $curso;

        return view('livewire.curso-detalhes');
    }

   


}
