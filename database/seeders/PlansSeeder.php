<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Plans;
use App\Models\PlansItem;

class PlansSeeder extends Seeder
{
    
    public function run()
    {
        $free_plan = Plans::create([
            'title' => 'Gratis', 
            'small_description' => 'Para você começar', 
            'price' => 0.0
        ]);

        PlansItem::create([
            'title' => 'Equipes com 3 usuarios', 
            'plan_id' => $free_plan->id
        ]);

        PlansItem::create([
            'title' => 'Até 3 boards de tarefas', 
            'plan_id' => $free_plan->id
        ]);

        PlansItem::create([
            'title' => 'Geração de um relatório', 
            'plan_id' => $free_plan->id
        ]);


        $pro_plan = Plans::create([
            'title' => 'PRO', 
            'small_description' => 'Para você decolar', 
            'price' => 4.99
        ]);

        PlansItem::create([
            'title' => 'Equipes com 5 usuarios', 
            'plan_id' => $pro_plan->id
        ]);

        PlansItem::create([
            'title' => 'Até 5 boards de tarefas', 
            'plan_id' => $pro_plan->id
        ]);

        PlansItem::create([
            'title' => 'Geração de 3 relatórios', 
            'plan_id' => $pro_plan->id
        ]);

        $premium_plan = Plans::create([
            'title' => 'PREMIUM', 
            'small_description' => 'Para empresas', 
            'price' => 9.99
        ]);

        PlansItem::create([
            'title' => 'Equipes com usuarios ilimitados', 
            'plan_id' => $premium_plan->id
        ]);

        PlansItem::create([
            'title' => 'Boards de tarefas ilimitados', 
            'plan_id' => $premium_plan->id
        ]);

        PlansItem::create([
            'title' => 'Geração de relatórios ilimitados', 
            'plan_id' => $premium_plan->id
        ]);        
    }
}
