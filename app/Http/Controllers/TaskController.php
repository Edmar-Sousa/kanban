<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Task;

class TaskController extends Controller
{
    protected Task $task_model;

    public function __construct(Task $task)
    {
        $this->task_model = $task;
    }


    public function index()
    {
        return Inertia::render('TaskBoard', [
            'tasks' => $this->task_model->get_all_tasks(),
        ]);
    }


    public function store(Request $request)
    {
        //
    }
}
