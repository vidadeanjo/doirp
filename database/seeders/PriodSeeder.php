<?php

namespace Database\Seeders;

use App\Models\Priod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Garantir que só exista um registro na tabela
          Priod::truncate();

          Priod::create([
              'email' => 'priodcentrotecnicoprofissional@gmail.com',
              'contacto' => '+244933411615',
              'whatsapp' => '+244933412141',
              'facebook_link' => 'https://www.facebook.com/Priod2024',
              'instagram_link' => 'https://www.instagram.com/priod993',
              'linkedin_link' => 'https://www.linkedin.com/',
              'missao' => 'A nossa missão é transformar os grandes desafios pessoais e institucionais em sucesso, criando “ soluções “ com produtos e serviços actuais usando a mais alta tecnologia, direccionados a todos os tipos de necessidades solicitadas pelos nossos clientes nas mais diversas actividades, onde o presente acompanha o futuro com objecto de um crescimento mútuo.',
              'visao' => 'Granjear destaque dos nossos clientes e tornarem-se referência nacional ou internacional ajudando-os a serem autónomos e independentes, do ponto de vista da mão-de-obra qualificada. Capacitar em conhecimentos práticos e teóricos o nosso público-alvo, de modos a superarem, e, solucionar os problemas e os desafios tecnológicos a que enfrentam, com eficiência e eficácia.',
          ]);
    }
}
