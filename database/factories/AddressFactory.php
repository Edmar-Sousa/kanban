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
        $faker = Faker::create('pt_BR');

        return [
            'user_id' => User::factory(),
            'street' => $faker->words(4, true),
            'numero' => $faker->numberBetween(),
            'complement' => $faker->words(7, true),
            'neighborhood' => $faker->word(),
            'city' => $faker->word(),
            'uf' => $faker->countryCode(),
            'zip_code' => $faker->numerify('#####-###')
        ];
    }
}
