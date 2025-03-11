<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Constants\Subscription;
use App\Models\Plans;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityPlanUser>
 */
class ActivityPlanUserFactory extends Factory
{
    public function definition(): array
    {
        $now = Carbon::now();

        $subscriptionsStatus = array_map(fn(Subscription $status) => $status->value, Subscription::cases());

        return [
            'user_id' => User::factory(),
            'plan_id' => Plans::factory(),
            'sign_date' => $now->format('Y-m-d H:i:s'),
            'expire_date' => $now->addDays(30)->format('Y-m-d H:i:s'),
            'status' => $this->faker->randomElement($subscriptionsStatus)
        ];
    }
}
