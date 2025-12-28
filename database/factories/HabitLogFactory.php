<?php

namespace Database\Factories;

use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'habit_id' => Habit::query()->inRandomOrder()->value('id'),
            'completed_at' => $this->faker->unique()->dateTimeBetween('-30 days', 'now')->format('Y-m-d')
        ];
    }
}
