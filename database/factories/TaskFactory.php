<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'priority' => $this->faker->randomElement(['Низкий', 'Средний', 'Высокий']),
            'date_deadline' => $this->faker->date(),
            'time_deadline' => $this->faker->time(),
            'status' => $this->faker->randomElement(['Ожидание', 'В процессе', 'Выполнена', 'Отменена']),
        ];
    }
}
