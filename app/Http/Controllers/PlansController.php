<?php

namespace App\Http\Controllers;

use App\Models\ActivityPlanUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Plans;

class PlansController extends Controller
{
    protected Plans $plans_model;
    protected ActivityPlanUser $activity_plan_user;

    public function __construct( Plans $plans, ActivityPlanUser $activity_plan_user )
    {
        $this->plans_model = $plans;
        $this->activity_plan_user = $activity_plan_user;
    }

    public function index()
    {
        $activityPlan = $this->activity_plan_user->getPlanActivityFromUser(Auth::user()->id);

        return Inertia::render('Plans', [
            'title' => 'Planos de assinatura',
            'activityPlan' => $activityPlan->plan->id,
        ]);
    }


    public function list(): JsonResponse
    {
        return response()->json($this->plans_model->get_plans());
    }
}
