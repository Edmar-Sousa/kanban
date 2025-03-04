<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Plans;

class PlansController extends Controller
{
    protected Plans $plans_model;


    public function __construct( Plans $plans )
    {
        $this->plans_model = $plans;
    }

    public function index()
    {
        return Inertia::render('Plans', [
            'title' => 'Planos de assinatura',
            'activitePlan' => Auth::user()->plan_id,
        ]);
    }


    public function list(): JsonResponse
    {
        return response()->json($this->plans_model->get_plans());
    }
}
