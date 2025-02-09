<?php

namespace App\Livewire;

use App\Models\categoria;
use App\Models\curso;
use Livewire\Component;

class Servicos extends Component
{
  
  
    public function render()
    {
        $categorias = categoria::with('servicos')->get();
        
        return view('livewire.servicos', compact('categorias'));
    }
}
