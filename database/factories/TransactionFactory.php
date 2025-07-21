<?php

namespace Database\Factories;

use App\Constants\PaymentsMethods;
use App\Constants\PaymentsStatus;
use App\Models\Plans;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'method' => $this->faker->randomElement([
                PaymentsMethods::PIX->value,
                PaymentsMethods::CREDIT_CARD->value,
            ]),

            'extern_id' => $this->faker->uuid(),
            
            'status' => $this->faker->randomElement([
                PaymentsStatus::PENDDING->value,
                PaymentsStatus::CREATED->value,
                PaymentsStatus::CONFIRMED->value,
                PaymentsStatus::CANCELED->value,
            ]),

            'plan_id' => Plans::factory(),
            'user_id' => User::factory(),
        ];
    }
}
