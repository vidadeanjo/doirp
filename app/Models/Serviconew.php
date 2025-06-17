<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviconew extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'categoria'
    ];

    // Sem relacionamentos - apenas campos simples
}
