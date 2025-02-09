<?php

namespace App\Livewire;

use App\Models\Priod;
use Livewire\Component;

class PriodForm extends Component
{

    public $email, $contacto, $whatsapp, $facebook_link, $instagram_link, $linkedin_link, $missao, $visao;
    public $isEditable = false; // Controle de edição

    public function mount()
    {
        // Preencher dados existentes
        $priod = Priod::first();
        if ($priod) {
            $this->fill($priod->toArray());
        }
    }

    public function enableEdit()
    {
        $this->isEditable = true;
    }

    public function save()
    {
        // Salvar alterações no banco de dados
        $priod = Priod::firstOrNew(); // Garantir um único registro
        $priod->fill([
            'email' => $this->email,
            'contacto' => $this->contacto,
            'whatsapp' => $this->whatsapp,
            'facebook_link' => $this->facebook_link,
            'instagram_link' => $this->instagram_link,
            'linkedin_link' => $this->linkedin_link,
            'missao' => $this->missao,
            'visao' => $this->visao,
        ]);
        $priod->save();

        $this->isEditable = false; // Desativar edição após salvar
        session()->flash('success', 'Informações salvas com sucesso!');
        redirect(route('admin-priod-info'));
    }

   
    public function render()
    {
        return view('livewire.priod-form');
    }
}
