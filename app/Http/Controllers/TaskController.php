<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;


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
            'tasks' => $this->task_model->get_all_tasks_of_user( Auth::user()->id ),
        ]);
    }


    public function store(StoreTaskRequest $request)
    {
        $this->task_model->store( $request->validated(), Auth::user()->id );
    }

    public function update(Request $request)
    {
        $this->task_model->update_state( $request->all() );
    }
}
