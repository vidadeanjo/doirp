<?php

namespace Database\Seeders;

use App\Models\Serviconew;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiconewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Serviconew::truncate();

        // Serviços de teste sem relacionamentos
        Serviconew::create([
            'nome' => 'Desenvolvimento Web Teste',
            'descricao' => 'Criação de sites e aplicações web personalizadas para teste.',
            'categoria' => 'Desenvolvimento'
        ]);

        Serviconew::create([
            'nome' => 'Consultoria em TI Teste',
            'descricao' => 'Assessoria técnica em tecnologia da informação para teste.',
            'categoria' => 'Consultoria'
        ]);

        Serviconew::create([
            'nome' => 'Manutenção de Sistemas Teste',
            'descricao' => 'Suporte e manutenção de sistemas existentes para teste.',
            'categoria' => 'Suporte'
        ]);

        Serviconew::create([
            'nome' => 'Treinamento Corporativo Teste',
            'descricao' => 'Capacitação de equipes em tecnologias modernas para teste.',
            'categoria' => 'Formação'
        ]);

        Serviconew::create([
            'nome' => 'Análise de Dados Teste',
            'descricao' => 'Processamento e análise de grandes volumes de dados para teste.',
            'categoria' => 'Analytics'
        ]);

        Serviconew::create([
            'nome' => 'Segurança Digital Teste',
            'descricao' => 'Implementação de soluções de segurança cibernética para teste.',
            'categoria' => 'Segurança'
        ]);

        Serviconew::create([
            'nome' => 'Cloud Computing Teste',
            'descricao' => 'Migração e gestão de infraestrutura em nuvem para teste.',
            'categoria' => 'Cloud'
        ]);

        Serviconew::create([
            'nome' => 'Mobile Development Teste',
            'descricao' => 'Desenvolvimento de aplicações móveis nativas e híbridas para teste.',
            'categoria' => 'Mobile'
        ]);
    }
}
