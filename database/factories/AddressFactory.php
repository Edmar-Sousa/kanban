<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'street' => $this->faker->words(4, true),
            'numero' => $this->faker->numberBetween(),
            'complement' => $this->faker->words(7, true),
            'neighborhood' => $this->faker->word(),
            'city' => $this->faker->word(),
            'uf' => $this->faker->countryCode(),
            'zip_code' => $this->faker->numerify('#####-###')
        ];
    }
}
