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
        if (empty($this->searchTerm)) {
            $this->cursos = Curso::all();
            return;
        }

        $termo = $this->normalize($this->searchTerm);

        $this->cursos = Curso::all()->filter(function ($curso) use ($termo) {
            return Str::of($this->normalize($curso->nome))->contains($termo);
        });
    }

    private function normalize($string)
    {
        $string = strtolower($string);
        $map = [
            'á'=>'a','à'=>'a','ã'=>'a','â'=>'a',
            'é'=>'e','ê'=>'e',
            'í'=>'i',
            'ó'=>'o','ô'=>'o','õ'=>'o',
            'ú'=>'u','ü'=>'u',
            'ç'=>'c'
        ];
        return strtr($string, $map);
    }

    public function detalhesCurso($id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            session()->flash('error', 'Curso não encontrado.');
            return;
        }

        return redirect()->route('curso-detalhe', ['id' => $id]);
    }
}
