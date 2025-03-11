<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{

    public function definition(): array
    {
        return [
            'destination_user' => User::factory(),
            'message' => $this->faker->words(6, true),
            'type' => $this->faker->randomElement([ Notification::TYPE_INVITE, Notification::TYPE_SYSTEM ]),
            'source_user' => User::factory(),
            'visible' => $this->faker->randomElement([true, false]),
        ];
    }
}
