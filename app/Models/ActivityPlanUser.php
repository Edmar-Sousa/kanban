<?php

namespace App\Models;

use App\Constants\Subscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityPlanUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'sign_date',
        'expire_date',
        'status',
    ];


    public function plan()
    {
        return $this->hasOne(Plans::class, 'id', 'plan_id');
    }

    public function createFreePlanToUser(int $userId)
    {
        return $this->create([
            'user_id' => $userId,
            'plan_id' => 1,
            'sign_date' => Carbon::now(),
            'status' => Subscription::ACTIVE,
        ]);
    }


    public function getPlanActivityFromUser(int $userId)
    {
        $now = Carbon::now();

        return $this->where('user_id', $userId)
            ->where('sign_date', '<=', $now)
            ->where('status', Subscription::ACTIVE)
            ->with('plan')
            ->first();
    }


    public function getPlanWithRulesFromUser(int $userId)
    {
        return $this->where('user_id', $userId)
            ->with([
                'plan' => fn ($query) => $query->with('plans_rule'),
            ])
            ->first();
    }


    public function updatePlanUser(int $userId, int $planId, string $dateEndSubscription)
    {
        $activityPlan = $this->getPlanActivityFromUser($userId);

        $startDateSubscription = Carbon::parse($activityPlan->sign_date);
        $endDateSubscription = Carbon::parse($dateEndSubscription)
            ->setHours($startDateSubscription->hour)
            ->setMinutes($startDateSubscription->minute);

        return $this->where('user_id', $userId)
            ->update([
                'plan_id' => $planId,
                'expire_date' => $endDateSubscription,
                'status' => Subscription::ACTIVE,
            ]);
    }
}
