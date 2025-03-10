<?php

namespace Database\Factories;

use App\Models\Plans;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlansItem>
 */
class PlansItemFactory extends Factory
{

    public function definition(): array
    {
        $faker = Faker::create('pt_BR');

        return [
            'title' => $faker->words(2, true),
            'plan_id' => Plans::factory(),
        ];
    }
}
