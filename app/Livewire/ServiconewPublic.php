<?php

namespace App\Livewire;

use App\Models\Serviconew;
use Livewire\Component;

class ServiconewPublic extends Component
{
    public $serviconews;

    public function mount()
    {
        // Busca todos os serviços sem relacionamentos
        $this->serviconews = Serviconew::all();
    }

    public function render()
    {
        return view('livewire.serviconew-public');
    }
}
