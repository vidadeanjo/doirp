<?php

namespace App\Livewire;

use App\Models\curso;
use Livewire\Component;

class AdminCursos extends Component
{

    public $nome, $descricao, $conteudo, $duracao, $preco, $modalidade, $turma;
    public $search = ''; // Variável para o input de pesquisa
    public $cursoId; // Usado para identificar o curso a ser editado/deletado
    public $editMode = false; // Alterna entre os modos de criação e edição
    public $cursos; // Variável para listar todos os cursos
    
        public function mount()
        {
            // Carrega os cursos ao iniciar
            $this->updateCursos();
        }
           // Função para filtrar os cursos
        public function updatedSearch()
        {
            $this->updateCursos();
        }
        public function render()
        {
            return view('livewire.admin-cursos');
        }
         /**
         * Lista os cursos
         */
       // Função auxiliar para atualizar a lista de cursos
        public function updateCursos()
        {
            $this->cursos = curso::query()
                ->where('nome', 'like', '%' . $this->search . '%')
                ->orWhere('descricao', 'like', '%' . $this->search . '%')
                ->get();
        }
     
        public function toggleDestaque($cursoId)
        {
            $curso = curso::find($cursoId);
    
            if ($curso) {
                $curso->destaque = !$curso->destaque; // Inverte o valor (true/false)
                $curso->save();
            }
    
            $this->cursos = curso::all(); // Atualiza a lista
          //  redirect(route('admin'));
        }
        public function addcurso()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'conteudo' => 'nullable|string',
            'duracao' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'modalidade' => 'required|in:presencial,online,hibrido',
            'turma' => 'nullable|date',
        ]);
    
        curso::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'conteudo' => $this->conteudo,
            'duracao' => $this->duracao,
            'preco' => $this->preco,
            'modalidade' => $this->modalidade,
            'turma' => $this->turma,
        ]);
        session()->flash('message', 'Curso criado com sucesso!');
        $this->resetForm();
        $this->updateCursos();
          // Redireciona explicitamente para a rota atual
    //return redirect()->route(request()->route()->getName());
    redirect(route('admin-cursos'));
    }

    /**
     * Prepara o formulário para edição
     */
    public function editCurso($id)
    {
        $curso = curso::findOrFail($id);

        $this->cursoId = $curso->id;
        $this->nome = $curso->nome;
        $this->descricao = $curso->descricao;
        $this->conteudo = $curso->conteudo;
        $this->duracao = $curso->duracao;
        $this->preco = $curso->preco;
        $this->modalidade = $curso->modalidade;
        $this->turma = $curso->turma;

        $this->editMode = true;
    }
    /**
     * Atualiza um curso existente
     */
    public function updateCurso()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'conteudo' => 'nullable|string',
            'duracao' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'modalidade' => 'required|in:presencial,online,hibrido',
            'turma'=>'nullable|date'
        ]);

        $curso = curso::findOrFail($this->cursoId);
        $curso->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'conteudo' => $this->conteudo,
            'duracao' => $this->duracao,
            'preco' => $this->preco,
            'modalidade' => $this->modalidade,
            'turma'=> $this->turma,
        ]);

        session()->flash('message', 'Curso atualizado com sucesso!');
        $this->resetForm();
        $this->editMode = false;
        $this->updateCursos();
        redirect(route('admin-cursos'));
    }
    /**
     * Deleta um curso
     */
    public function deleteCurso($id)
    {
        $curso = curso::findOrFail($id);
        $curso->delete();

        session()->flash('message', 'Curso deletado com sucesso!');
        $this->updateCursos();
    }
      /**
     * Reseta o formulário
     */
    public function resetForm()
    {
        $this->nome = '';
        $this->descricao = '';
        $this->conteudo = '';
        $this->duracao = '';
        $this->preco = '';
        $this->modalidade = '';
        $this->turma = '';

        $this->cursoId = null;
    }
      /**
     * Cancela a edição
     */
    public function cancelEdit()
    {
        $this->resetForm();
        $this->editMode = false;
    }

    
}
