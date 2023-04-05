<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Task;

class TaskSeeder extends Seeder
{
    
    public function run()
    {
        Task::create([ 
            'title' => 'Drag And Drop', 
            'description' => 'Adicionar Drag and Drop ao front-end do projeto Kanban',
            'state' => 1 // A fazer
        ]);

        Task::create([ 
            'title' => 'Upload de imagem', 
            'description' => 'Adicionar upload de imagem ao projeto Kanban',
            'state' => 1 // A fazer
        ]);

        Task::create([ 
            'title' => 'GitHub', 
            'description' => 'Criar o readme.md do projeto Kanban no github',
            'state' => 1 // A fazer
        ]);
    }
}
