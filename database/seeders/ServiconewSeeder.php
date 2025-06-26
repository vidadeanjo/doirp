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
        // Usar delete() ao invés de truncate() para evitar problemas
        Serviconew::query()->delete();

        // Serviços da categoria "Formação e Consultoria"
        Serviconew::create([
            'nome' => 'Capacitação de Funcionários',
            'descricao' => 'Capacitação de funcionários na indústria em diversas áreas.',
            'categoria' => 'Formação e Consultoria'
        ]);

        Serviconew::create([
            'nome' => 'Formação ao Público',
            'descricao' => 'Formação para o público em geral.',
            'categoria' => 'Formação e Consultoria'
        ]);

        Serviconew::create([
            'nome' => 'Inovação Tecnológica',
            'descricao' => 'Inovação tecnológica e assessoria na indústria.',
            'categoria' => 'Formação e Consultoria'
        ]);

        Serviconew::create([
            'nome' => 'Criação de Sites',
            'descricao' => 'Criação de sites (Básicos, Intermédios e Personalizados).',
            'categoria' => 'Formação e Consultoria'
        ]);

        Serviconew::create([
            'nome' => 'Alojamento de Emails Profissionais',
            'descricao' => 'Serviço de hospedagem de emails profissionais.',
            'categoria' => 'Formação e Consultoria'
        ]);

        // Serviços da categoria "Desenvolvimento de Softwares"
        Serviconew::create([
            'nome' => 'Softwares Personalizados',
            'descricao' => 'Softwares para diversos objetivos sociais.',
            'categoria' => 'Desenvolvimento de Softwares'
        ]);

        Serviconew::create([
            'nome' => 'Sistema de Gestão Escolar',
            'descricao' => 'Colégios, creches e escolas normais.',
            'categoria' => 'Desenvolvimento de Softwares'
        ]);

        Serviconew::create([
            'nome' => 'Sistema de Gestão de Centros de Formação',
            'descricao' => 'Gestão de centros de formação profissional.',
            'categoria' => 'Desenvolvimento de Softwares'
        ]);

        Serviconew::create([
            'nome' => 'Sistema de Gestão Comercial',
            'descricao' => 'Faturação e controle de vendas.',
            'categoria' => 'Desenvolvimento de Softwares'
        ]);

        Serviconew::create([
            'nome' => 'Sistema de Gestão Hospitalar',
            'descricao' => 'Soluções para clínicas e consultórios médicos.',
            'categoria' => 'Desenvolvimento de Softwares'
        ]);

        // Serviços da categoria "Manutenção e Network"
        Serviconew::create([
            'nome' => 'Instalação de Aplicativos',
            'descricao' => 'Configuração de aplicativos para Windows.',
            'categoria' => 'Manutenção e Network'
        ]);

        Serviconew::create([
            'nome' => 'Instalação de Servidores',
            'descricao' => 'Windows Server e Linux.',
            'categoria' => 'Manutenção e Network'
        ]);

        Serviconew::create([
            'nome' => 'Implementação de Redes Estruturadas',
            'descricao' => 'Redes domésticas e empresariais.',
            'categoria' => 'Manutenção e Network'
        ]);
    }
}
