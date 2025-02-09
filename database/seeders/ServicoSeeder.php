<?php

namespace Database\Seeders;

use App\Models\servico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        servico::truncate();

        // Serviços da categoria "Formação e Consultoria"
        Servico::create(['nome' => 'Capacitação de Funcionários', 'descricao' => 'Capacitação de funcionários na indústria em diversas áreas.', 'categoria_id' => 1]);
        Servico::create(['nome' => 'Formação ao Público', 'descricao' => 'Formação para o público em geral.', 'categoria_id' => 1]);
        Servico::create(['nome' => 'Inovação Tecnológica', 'descricao' => 'Inovação tecnológica e assessoria na indústria.', 'categoria_id' => 1]);
        Servico::create(['nome' => 'Criação de Sites', 'descricao' => 'Criação de sites (Básicos, Intermédios e Personalizados).', 'categoria_id' => 1]);
        Servico::create(['nome' => 'Alojamento de Emails Profissionais', 'descricao' => 'Serviço de hospedagem de emails profissionais.', 'categoria_id' => 1]);

        // Serviços da categoria "Desenvolvimento de Softwares"
        Servico::create(['nome' => 'Softwares Personalizados', 'descricao' => 'Softwares para diversos objetivos sociais.', 'categoria_id' => 2]);
        Servico::create(['nome' => 'Sistema de Gestão Escolar', 'descricao' => 'Colégios, creches e escolas normais.', 'categoria_id' => 2]);
        Servico::create(['nome' => 'Sistema de Gestão de Centros de Formação', 'descricao' => 'Gestão de centros de formação profissional.', 'categoria_id' => 2]);
        Servico::create(['nome' => 'Sistema de Gestão Comercial', 'descricao' => 'Faturação e controle de vendas.', 'categoria_id' => 2]);
        Servico::create(['nome' => 'Sistema de Gestão Hospitalar', 'descricao' => 'Soluções para clínicas e consultórios médicos.', 'categoria_id' => 2]);

        // Serviços da categoria "Manutenção e Network"
        Servico::create(['nome' => 'Instalação de Aplicativos', 'descricao' => 'Configuração de aplicativos para Windows.', 'categoria_id' => 3]);
        Servico::create(['nome' => 'Instalação de Servidores', 'descricao' => 'Windows Server e Linux.', 'categoria_id' => 3]);
        Servico::create(['nome' => 'Implementação de Redes Estruturadas', 'descricao' => 'Redes domésticas e empresariais.', 'categoria_id' => 3]);
    
    }
}
