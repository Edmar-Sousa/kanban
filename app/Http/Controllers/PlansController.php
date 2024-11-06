<?php

namespace App\Http\Controllers;

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
            'plans' => $this->plans_model->get_plans(),
            'activite_plan' => Auth::user()->plan_id,
        ]);
    }
}
