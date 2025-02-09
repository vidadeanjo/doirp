<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    //
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    // Relacionamento com Serviços
    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }



    
}
