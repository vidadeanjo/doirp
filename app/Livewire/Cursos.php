<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Component;
use Illuminate\Support\Str;

class Cursos extends Component
{
    public $cursos;
    public $searchTerm = '';

    public function render()
    {
        $this->refreshCursos();
        return view('livewire.cursos');
    }

    public function refreshCursos()
    {
        $search = $this->normalize($this->searchTerm);

        $this->cursos = Curso::when($search, function ($query) use ($search) {
            $query->whereRaw("LOWER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nome,
                'á','a'),'à','a'),'ã','a'),'â','a'),'é','e'),'ê','e'),'í','i'),'ó','o'),'ô','o'),'ú','u')) LIKE ?", ["%$search%"]);
        })->get();
    }

    private function normalize($string)
    {
        $string = strtolower($string);
        $unwanted = ['á'=>'a','à'=>'a','ã'=>'a','â'=>'a','é'=>'e','ê'=>'e','í'=>'i','ó'=>'o','ô'=>'o','ú'=>'u','ç'=>'c'];
        return strtr($string, $unwanted);
    }

    public function detalhesCurso($id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            session()->flash('error', 'Curso não encontrado.');
            return;
        }

        return redirect()->route('curso-detalhes', ['id' => $curso->id]);
    }
}
