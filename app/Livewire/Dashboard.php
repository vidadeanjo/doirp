<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalServicos, $totalCursos, $totalCategorias;

    public function mount(){
        $totalServicos = DB::table('serviconews')->count();
        $totalCursos = DB::table('cursos')->count();

        $this->totalServicos = $totalServicos;
        $this->totalCursos = $totalCursos;

    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
