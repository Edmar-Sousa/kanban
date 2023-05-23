<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\TaskBoardStoreRequest;
use App\Models\TaskBoards;
use App\Models\Plans;


class TaskBoardController extends Controller
{
    protected TaskBoards $task_board_model;
    protected Plans $plans_model;

    public function __construct( TaskBoards $task_board, Plans $plans )
    {
        $this->task_board_model = $task_board;
        $this->plans_model = $plans;
    }


    public function index()
    {
        return Inertia::render('TaskBoard', [
            'image' => Auth::user()->image,
            'taskboards' => $this->task_board_model->get_task_board_user( Auth::user()->id ),
        ]);
    }


    public function store(TaskBoardStoreRequest $request)
    {
        $plan_user = $this->plans_model->get_plan_with_id( Auth::user()->id );

        $this->task_board_model->create_taskboard( $request->validated(), Auth::user()->id );
    }


    public function delete( Request $request ) {
        $request->validate([ 'id' => 'required|exists:task_boards,id' ]);

        $this->task_board_model->delete_taskboard( $request->input('id') );
    }
}
