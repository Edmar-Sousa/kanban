<?php

namespace Database\Factories;

use App\Models\TaskBoards;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->words(6, true),
            'taskboard_id' => TaskBoards::factory(),
            'state' => 1,
        ];
    }
}
