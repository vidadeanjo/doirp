<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao'
    ];

    // Relacionamento: Uma categoria tem muitos serviços
    public function servicos()
    {
        return $this->hasMany(Servico::class, 'categoria_id');
    }
}
