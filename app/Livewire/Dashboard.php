<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalServicos, $totalCursos, $totalCategorias;

    public function mount(){
        $totalServicos = DB::table('servicos')->count();
        $totalCursos = DB::table('cursos')->count();
        $totalCategorias = DB::table('categorias')->count();

        $this->totalServicos = $totalServicos;
        $this->totalCursos = $totalCursos;
        $this->totalCategorias = $totalCategorias;

    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
