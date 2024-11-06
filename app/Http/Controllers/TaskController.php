<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Task;
use App\Models\TaskBoards;
use App\Http\Requests\StoreTaskRequest;


class TaskController extends Controller
{
    protected Task $task_model;
    protected TaskBoards $task_board_model;

    public function __construct( Task $task, TaskBoards $task_board )
    {
        $this->task_model = $task;
        $this->task_board_model = $task_board;
    }


    public function index( int $id )
    {
        return Inertia::render('TaskBoardTasks', [
            'image' => Auth::user()->image,
            'taskboard' => $this->task_board_model->get_task_board_with_tasks( $id ),
        ]);
    }


    public function store(StoreTaskRequest $request)
    {
        $this->task_model->store( $request->validated() );
    }

    public function update(Request $request)
    {
        $this->task_model->update_state( $request->all() );
    }

    public function delete(Request $request)
    {
        $this->task_model->delete_task( $request->input('id') );
    }
}
