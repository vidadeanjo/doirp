<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class ServicoIn extends Component
{
    public $categorias;

    public function mount(){
         // Recupera categorias com seus serviços associados
         $categorias = Categoria::with('servicos')->get();
         $this-> categorias = $categorias;

    }
     public function render()
    {
        return view('livewire.servico-in');
    }
}
