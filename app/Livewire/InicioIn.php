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
}
