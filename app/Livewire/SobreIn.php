<?php

namespace App\Livewire;

use App\Models\Priod;
use Livewire\Component;

class SobreIn extends Component
{
    public $missao, $visao;
    public function render()
    {
        $priod = Priod::first();
        $this-> missao = $priod->missao;
        $this-> visao = $priod->visao;
        return view('livewire.sobre-in');
    }
}
