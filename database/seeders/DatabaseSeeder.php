<?php

namespace Database\Seeders;

use App\Models\categoria;
use App\Models\curso;
use App\Models\servico;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */ public function run(): void
    {
        /*Criar 5 categorias e serviços associados
        categoria::factory(5)
            ->has(servico::factory(10)) // Cada categoria terá 10 serviços
            ->create();
*/
        // Criar 20 cursos
       // curso::factory(20)->create();

       $this->call([
        AdminSeeder::class,
        CursoSeeder::class,
        CategoriaSeeder::class,
        ServicoSeeder::class,
        PriodSeeder::class,
        
    ]);
    }
}
