<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'priodcentrotecnicoprofissional@gmail.com'], // Substitua pelo e-mail fixo do admin
            [
                'name' => 'Administrador',
                'password' => Hash::make('priodcentrotecnicoprofissional@gmail.com-2024'), // Substitua pela senha desejada
            ]
        );
    }
}
