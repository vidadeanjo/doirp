<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagens'; // Especifica o nome correto da tabela

    protected $fillable = [
        'nome',
        'email',
        'assunto',
        'mensagem',
        'lida',
        'lida_em'
    ];

    protected $casts = [
        'lida' => 'boolean',
        'lida_em' => 'datetime'
    ];
}