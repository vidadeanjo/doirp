<?php

namespace App\Livewire;

use App\Models\Priod;
use Livewire\Component;

class Footer extends Component
{
    public $priod;
    public function mount(){
        
        $this->priod = Priod::first();
    
    }
    public function render()
    {
        return view('livewire.footer');
    }
}
