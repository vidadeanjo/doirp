<?php

namespace App\Livewire;

use Livewire\Component;

class TestCurso extends Component
{
    public $count = 1;

 

    public function render()
    {
        return view('livewire.test-curso');
    }

    
public function increment()
{
    $this->count++;
}

public function decrement()
{
    $this->count--;
}
}
