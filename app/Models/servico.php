<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servico extends Model
{
    /** @use HasFactory<\Database\Factories\ServicoFactory> */
    use HasFactory;

    protected $fillable = [ 'nome', 'descricao','categoria_id'];

    // Relacionamento com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
