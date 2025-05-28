<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin-mensagens', compact('mensagens'));
    }

    public function show($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        
        if (!$mensagem->lida) {
            $mensagem->update([
                'lida' => true,
                'lida_em' => now()
            ]);
        }
        
        return view('livewire.admin-mensagem-detalhes', compact('mensagem'));
    }

    public function destroy($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete();
        
        return redirect()->route('admin-mensagens')
            ->with('success', 'Mensagem excluída com sucesso!');
    }
}