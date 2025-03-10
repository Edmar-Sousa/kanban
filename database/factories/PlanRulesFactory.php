<?php

namespace Database\Factories;

use App\Models\Plans;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanRules>
 */
class PlanRulesFactory extends Factory
{

    public function definition(): array
    {
        return [
            'limit_boards' => $this->faker->randomDigit(),
            'limit_users' => $this->faker->randomDigit(),
            'limit_reports' => $this->faker->randomDigit(),
            
            'plan_id' => Plans::factory(),
        ];
    }
}
