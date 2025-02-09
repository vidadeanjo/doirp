<?php

namespace App\Livewire;

use App\Models\curso;
use Livewire\Component;



class AddCurso extends Component
{

public $nome, $descricao, $conteudo, $duracao, $preco, $modalidade;

public $cursoId; // Usado para identificar o curso a ser editado/deletado
public $editMode = false; // Alterna entre os modos de criação e edição
public $cursos; // Variável para listar todos os cursos


    public function render()
    {
        return view('livewire.add-curso');
    }

 
    public function adicionarCurso()
{
    $this->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string',
        'conteudo' => 'required|string',
        'duracao' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'modalidade' => 'required|in:presencial,online,hibrido',
    ]);

    curso::create([
        'nome' => $this->nome,
        'descricao' => $this->descricao,
        'conteudo' => $this->conteudo,
        'duracao' => $this->duracao,
        'preco' => $this->preco,
        'modalidade' => $this->modalidade,
    ]);
    
    return $this->redirect('/admin-panel');
}


}
