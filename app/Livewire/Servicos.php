<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\curso;
use Livewire\Component;

class Servicos extends Component
{
  
  
    public function render()
    {
        $categorias = Categoria::with('servicos')->get();
        
        return view('livewire.servicos', compact('categorias'));
    }
}
