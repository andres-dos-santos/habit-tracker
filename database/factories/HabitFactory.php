<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HabitFactory extends Factory
{
    public function definition(): array
    {
        $habits = [
            'Ler 10 páginas',
            'Meditar 15 minutos',
            'Fazer exercícios físicos por 30 minutos',
            'Beber 2 litros de água'
        ];

        return [
            'user_id' => 1,
            'name' => $this->faker->unique()->randomElement($habits),
        ];
    }
}
