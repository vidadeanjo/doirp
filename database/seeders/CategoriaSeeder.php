<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            // Desativar verificação de chaves estrangeiras
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // Truncar a tabela
    DB::table('categorias')->truncate();

    // Reativar verificação de chaves estrangeiras
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //categoria::truncate();

        Categoria::create(['nome' => 'Formação e Consultoria', 'descricao' => 'Capacitação e consultoria para indústria e público.']);
        Categoria::create(['nome' => 'Desenvolvimento de Softwares', 'descricao' => 'Softwares para diversos objetivos sociais.']);
        Categoria::create(['nome' => 'Manutenção e Network', 'descricao' => 'Manutenção técnica e configuração de redes.']);
    
    }
}
