<?php

namespace Database\Factories;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friends>
 */
class FriendsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'destination_user' => User::factory(),
            'source_user' => User::factory(),
            'status' => $this->faker->randomElement([ 
                Friends::STATUS_ACEPTED,
                Friends::STATUS_DECLINE,
                Friends::STATUS_INVITED,
            ]),
        ];
    }
}
