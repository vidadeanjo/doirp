<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function enviarMensagem(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'assunto' => 'required|string|max:255',
        'mensagem' => 'required|string',
    ]);

    Mensagem::create($request->only(['nome', 'email', 'assunto', 'mensagem']));

    return redirect()->route('contacto')
        ->with('success', 'Sua mensagem foi enviada com sucesso! Entraremos em contato em breve.');
}
}
