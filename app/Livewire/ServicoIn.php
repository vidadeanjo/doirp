<?php

namespace App\Livewire;

use App\Models\categoria;
use Livewire\Component;

class ServicoIn extends Component
{
    public $categorias;

    public function mount(){
         // Recupera categorias com seus serviços associados
         $categorias = categoria::with('servicos')->get();
         $this-> categorias = $categorias;

    }
    public function render()
    {
        return view('livewire.servico-in');
    }
}
