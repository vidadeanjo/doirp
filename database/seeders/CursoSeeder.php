<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the table before seeding
      // Truncate the table before seeding
     DB::statement('SET CONSTRAINTS ALL DEFERRED'); //comando portgres
      DB::table('cursos')->truncate();
      //DB::statement('SET FOREIGN_KEY_CHECKS=1;'); comando mysql

      $cursos = [
          [
              'nome' => 'Autómatos Programável (PLC Siemens e Portal TIA)',
              'descricao' => 'Curso especializado em programação e configuração de PLCs Siemens utilizando o ambiente Portal TIA.',
              'conteudo' => "Introdução aos PLCs Siemens\nFundamentos do Portal TIA\nProgramação em Ladder\nConfiguração de Hardware\nComunicação e Redes\nDiagnóstico e Troubleshooting",
              'duracao' => '30h',
              'destaque' => true,
              'preco' => 185000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Sistemas SCADA e HMI',
              'descricao' => 'Formação completa em sistemas de supervisão e interface homem-máquina.',
              'conteudo' => "Fundamentos de SCADA\nConfiguração de HMI\nDesenvolvimento de Telas\nAlarmes e Eventos\nHistóricos e Relatórios",
              'duracao' => '30h',
              'destaque' => false,
              'preco' => 115000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Mecânica Auto',
              'descricao' => 'Curso prático de mecânica automotiva com foco em diagnóstico e manutenção.',
              'conteudo' => "Sistemas Mecânicos\nMotor e Transmissão\nSistemas de Freios\nSuspensão e Direção\nDiagnóstico de Falhas",
              'duracao' => '40h',
              'destaque' => false,
              'preco' => 120000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Electricidade Auto',
              'descricao' => 'Formação em sistemas elétricos automotivos modernos.',
              'conteudo' => "Sistemas Elétricos Básicos\nSistemas de Ignição\nSistemas de Carga\nDiagnóstico Eletrônico\nSistemas de Conforto",
              'duracao' => '36h',
              'destaque' => false,
              'preco' => 115000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Tecnologia de Controlo e Processos na Indústria Petrolífera',
              'descricao' => 'Curso avançado sobre controle e processos específicos da indústria petrolífera.',
              'conteudo' => "Fundamentos de Processos Petrolíferos\nSistemas de Controle Industrial\nInstrumentação em Refinarias\nOtimização de Processos\nSegurança em Processos",
              'duracao' => '36h',
              'destaque' => true,
              'preco' => 115000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Inglês Técnico (nível I)',
              'descricao' => 'Curso de inglês técnico focado em terminologia industrial e tecnológica.',
              'conteudo' => "Vocabulário Técnico Básico\nLeitura de Manuais Técnicos\nComunicação Oral em Ambiente Industrial\nEscrita de Relatórios Técnicos",
              'duracao' => '4 meses/1 mês',
              'destaque' => false,
              'preco' => 13900.00,
              'modalidade' => 'Híbrido'
          ],
          [
              'nome' => 'Inglês Técnico (nível II)',
              'descricao' => 'Continuação do curso de inglês técnico com foco em habilidades avançadas.',
              'conteudo' => "Vocabulário Técnico Avançado\nInterpretação de Documentação Técnica\nApresentações Técnicas em Inglês\nNegociações em Ambiente Internacional",
              'duracao' => '4 meses/1 mês',
              'destaque' => false,
              'preco' => 13900.00,
              'modalidade' => 'Híbrido'
          ],
          [
              'nome' => 'Inglês Técnico (nível III)',
              'descricao' => 'Nível avançado de inglês técnico para profissionais da indústria.',
              'conteudo' => "Redação de Artigos Técnicos\nParticipação em Conferências Internacionais\nGestão de Projetos em Inglês\nTreinamento e Consultoria em Inglês",
              'duracao' => '4 meses/1 mês',
              'destaque' => false,
              'preco' => 13900.00,
              'modalidade' => 'Híbrido'
          ],
          [
              'nome' => 'Electrónica Geral (nível I)',
              'descricao' => 'Introdução aos fundamentos da eletrônica.',
              'conteudo' => "Componentes Eletrônicos Básicos\nCircuitos DC e AC\nIntrodução a Semicondutores\nMedições Eletrônicas\nProjetos Práticos Simples",
              'duracao' => '2 meses',
              'destaque' => false,
              'preco' => 120000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Electrónica Geral (nível II)',
              'descricao' => 'Curso avançado de eletrônica com aplicações práticas.',
              'conteudo' => "Amplificadores Operacionais\nCircuitos Digitais\nMicrocontroladores\nEletrônica de Potência\nProjetos Avançados",
              'duracao' => '2 meses',
              'destaque' => false,
              'preco' => 125000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Hardware',
              'descricao' => 'Curso focado em manutenção e configuração de hardware de computadores.',
              'conteudo' => "Arquitetura de Computadores\nMontagem e Desmontagem\nDiagnóstico de Problemas\nUpgrades de Hardware\nManutenção Preventiva",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 95000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Higiene, Saúde e Segurança no Trabalho (nível II)',
              'descricao' => 'Curso avançado sobre práticas de segurança e saúde ocupacional.',
              'conteudo' => "Legislação de Segurança do Trabalho\nGestão de Riscos Ocupacionais\nErgonomia Avançada\nInvestigação de Acidentes\nAuditorias de Segurança",
              'duracao' => '24h',
              'destaque' => false,
              'preco' => 115000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Especificação dos produtos de refinação de petróleo',
              'descricao' => 'Curso detalhado sobre especificações e qualidade de produtos petrolíferos.',
              'conteudo' => "Processos de Refinação\nEspecificações de Combustíveis\nTestes de Qualidade\nNormas Internacionais\nControle de Qualidade em Refinarias",
              'duracao' => '36h',
              'destaque' => true,
              'preco' => 650000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Tecnologia de Produção de Cimento',
              'descricao' => 'Curso especializado em processos de produção de cimento.',
              'conteudo' => "Matérias-primas e Preparação\nProcessos de Clinquerização\nMoagem de Cimento\nControle de Qualidade\nAspectos Ambientais na Produção",
              'duracao' => '40h',
              'destaque' => false,
              'preco' => 490000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Manutenção Mecânica',
              'descricao' => 'Curso prático de manutenção mecânica industrial.',
              'conteudo' => "Fundamentos de Manutenção\nManutenção Preventiva e Preditiva\nAlinhamento e Balanceamento\nLubrificação Industrial\nGestão da Manutenção",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 110000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Sistemas de abastecimento de água',
              'descricao' => 'Curso sobre projeto e manutenção de sistemas de abastecimento de água.',
              'conteudo' => "Captação e Tratamento de Água\nRedes de Distribuição\nBombas e Estações Elevatórias\nControle de Perdas\nGestão de Sistemas de Abastecimento",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 95000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Informática',
              'descricao' => 'Curso básico de informática para iniciantes.',
              'conteudo' => "Introdução ao Windows\nMicrosoft Office Básico\nNavegação na Internet\nSegurança Digital Básica\nIntrodução ao E-mail",
              'duracao' => '1 mes',
              'destaque' => false,
              'preco' => 55000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Programação',
              'descricao' => 'Introdução às linguagens de programação e lógica de programação.',
              'conteudo' => "Lógica de Programação\nIntrodução a Python\nEstrutura de Dados\nProgramação Orientada a Objetos\nDesenvolvimento de Pequenos Projetos",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 85000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Excel avançado',
              'descricao' => 'Curso avançado de Excel com foco em análise de dados e automação.',
              'conteudo' => "Fórmulas Avançadas\nTabelas Dinâmicas\nMacros e VBA\nDashboards\nAnálise de Dados",
              'duracao' => '20h',
              'destaque' => true,
              'preco' => 80000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Instrumentação e Processos Industriais',
              'descricao' => 'Curso abrangente sobre instrumentação e controle de processos industriais.',
              'conteudo' => "Sensores e Transdutores\nControladores Industriais\nSistemas de Controle\nCalibração de Instrumentos\nOtimização de Processos",
              'duracao' => '40h',
              'destaque' => false,
              'preco' => 164000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Automação Industrial',
              'descricao' => 'Curso completo de automação industrial com práticas em equipamentos modernos.',
              'conteudo' => "CLPs e IHMs\nRedes Industriais\nSistemas SCADA\nRobótica Industrial\nIntegração de Sistemas",
              'duracao' => '32h',
              'destaque' => true,
              'preco' => 180000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Electricidade baixa tensão (Construção Civil)',
              'descricao' => 'Curso prático de instalações elétricas residenciais e comerciais.',
              'conteudo' => "Normas Técnicas\nDimensionamento de Circuitos\nInstalações Elétricas Prediais\nIluminação\nSegurança em Instalações Elétricas",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 95000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Electricidade Industrial',
              'descricao' => 'Curso avançado de sistemas elétricos industriais.',
              'conteudo' => "Sistemas Trifásicos\nMotores Elétricos\nQuadros de Distribuição\nCorreção de Fator de Potência\nProteção de Sistemas Elétricos",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 100000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Hidráulica e Pneumática Industrial',
              'descricao' => 'Formação especializada em sistemas hidráulicos e pneumáticos industriais.',
              'conteudo' => "Princípios de Hidráulica e Pneumática\nComponentes e Circuitos\nDimensionamento de Sistemas\nManutenção de Sistemas\nAplicações Industriais",
              'duracao' => '30h',
              'destaque' => false,
              'preco' => 90000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Higiene, Saúde e Segurança no Trabalho (nível I)',
              'descricao' => 'Curso introdutório sobre práticas de segurança e saúde ocupacional.',
              'conteudo' => "Conceitos Básicos de SST\nLegislação Aplicável\nIdentificação de Riscos\nEquipamentos de Proteção\nPrimeiros Socorros Básicos",
              'duracao' => '24h',
              'destaque' => false,
              'preco' => 85000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Combates contra Incêndios e Técnicas de Primeiros Socorros',
              'descricao' => 'Treinamento prático em combate a incêndios e primeiros socorros.',
              'conteudo' => "Prevenção de Incêndios\nClasses de Fogo\nUso de Extintores\nPrimeiros Socorros\nEvacuação de Emergência",
              'duracao' => '24h',
              'destaque' => false,
              'preco' => 80000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Controlo de Qualidade',
              'descricao' => 'Curso sobre princípios e práticas de controle de qualidade em processos industriais.',
              'conteudo' => "Fundamentos da Qualidade\nFerramentas da Qualidade\nControle Estatístico de Processo\nNormas ISO 9000\nAuditorias da Qualidade",
              'duracao' => '30h',
              'destaque' => false,
              'preco' => 110000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Elaboração de Projecto de Impactes Ambientais',
              'descricao' => 'Curso especializado em avaliação e elaboração de projetos de impacto ambiental.',
              'conteudo' => "Legislação Ambiental\nMetodologias de Avaliação de Impacto\nElaboração de EIA/RIMA\nMedidas Mitigadoras\nGestão Ambiental",
              'duracao' => '40h',
              'destaque' => true,
              'preco' => 480000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Elaboração de Projecto de Arquitectura',
              'descricao' => 'Curso prático de elaboração de projetos arquitetônicos.',
              'conteudo' => "Fundamentos de Projeto\nDesenho Técnico Arquitetônico\nSoftware CAD\nNormas e Legislação\nApresentação de Projetos",
              'duracao' => '40h',
              'destaque' => false,
              'preco' => 485000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Elaboração de Projecto Industrial',
              'descricao' => 'Curso avançado de planejamento e elaboração de projetos industriais.',
              'conteudo' => "Análise de Viabilidade\nLayout Industrial\nDimensionamento de Equipamentos\nNormas e Regulamentações\nGestão de Projetos Industriais",
              'duracao' => '40h',
              'destaque' => true,
              'preco' => 550000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Gestão de Qualidade',
              'descricao' => 'Curso abrangente sobre sistemas de gestão da qualidade.',
              'conteudo' => "Princípios de Gestão da Qualidade\nSistema ISO 9001\nMelhoria Contínua\nGestão por Processos\nAuditorias de Qualidade",
              'duracao' => '24h',
              'destaque' => false,
              'preco' => 85000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Comandos Eléctricos',
              'descricao' => 'Curso prático sobre sistemas de comando e controle elétrico industrial.',
              'conteudo' => "Componentes de Comando\nCircuitos de Comando e Força\nDiagramas Elétricos\nProteção de Motores\nAutomação de Comandos",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 135000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Electromecânica Industrial',
              'descricao' => 'Curso integrado de sistemas elétricos e mecânicos em ambiente industrial.',
              'conteudo' => "Fundamentos de Eletricidade\nMecânica Industrial\nMáquinas Elétricas\nSistemas de Transmissão\nManutenção Eletromecânica",
              'duracao' => '32h',
              'destaque' => false,
              'preco' => 105000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Design Mecânico',
              'descricao' => 'Curso de design e projeto de componentes e sistemas mecânicos.',
              'conteudo' => "Desenho Técnico Mecânico\nSoftware CAD 3D\nCálculo de Estruturas\nMateriais e Processos\nPrototipagem Rápida",
              'duracao' => '30h',
              'destaque' => false,
              'preco' => 105000.00,
              'modalidade' => 'Presencial'
          ],
          [
              'nome' => 'Automação e Controle Residencial',
              'descricao' => 'Curso sobre sistemas de automação e controle para ambientes residenciais.',
              'conteudo' => "Fundamentos de Automação Residencial\nSistemas de Iluminação\nControle de Acesso\nIntegração de Sistemas\nProjetos Práticos",
              'duracao' => '32h',
              'destaque' => true,
              'preco' => 170000.00,
              'modalidade' => 'Presencial'
          ]
      ];

      foreach ($cursos as $curso) {
          DB::table('cursos')->insert([
              'nome' => $curso['nome'],
              'descricao' => $curso['descricao'],
              'conteudo' => $curso['conteudo'],
              'duracao' => $curso['duracao'],
              'destaque' => $curso['destaque'],
              'preco' => $curso['preco'],
              'modalidade' => $curso['modalidade'],
              'created_at' => now(),
              'updated_at' => now()
          ]);
        }

    }
}
