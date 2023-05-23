<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\PlanRules;

class PlanRulesSeeder extends Seeder
{
    public function run()
    {
        PlanRules::create([
            'limit_boards' => 3, 
            'limit_users' => 3, 
            'limit_reports' => 1, 
            'plan_id' => 1 // Plano Gratis
        ]);

        PlanRules::create([
            'limit_boards' => 5, 
            'limit_users' => 5, 
            'limit_reports' => 3, 
            'plan_id' => 2 // Plano PRO
        ]);

        PlanRules::create([
            'limit_boards' => 0, 
            'limit_users' => 0, 
            'limit_reports' => 0, 
            'plan_id' => 3 // Plano PREMIUM
        ]);
    }
}
