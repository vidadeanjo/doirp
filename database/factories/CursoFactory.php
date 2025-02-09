<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->words(3, true), // Nome do curso
            'descricao' => $this->faker->paragraph(), // Descrição detalhada
            'conteudo' => $this->faker->paragraphs(3, true), // Conteúdo programático
            'duracao' => $this->faker->numberBetween(10, 200) . ' horas', // Duração do curso
            'destaque' => $this->faker->boolean(30), // 30% de chance de ser destaque
            'preco' => $this->faker->randomFloat(2, 100, 5000), // Preço do curso
            'modalidade' => $this->faker->randomElement(['Presencial', 'Online', 'Híbrido']), // Modalidade
       
        ];
    }
}
