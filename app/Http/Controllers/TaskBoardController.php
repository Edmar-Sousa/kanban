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
        $plan_user = $this->plans_model->get_plan_with_id( Auth::user()->plan_id )
            ->with( ['plans_rule'] )
            ->first();
        
        if ( $this->task_board_model->count_boards_user( Auth::user()->id ) < $plan_user->plans_rule->limit_boards )
        {
            $this->task_board_model->create_taskboard( $request->validated(), Auth::user()->id );
            
            return redirect()->route( 'taskboard' )->with( [
                    'message' => 'Plano criado com sucesso!',
                    'status' => 2
                ] );
        }
        
        return redirect()->route( 'taskboard' )->with( [
                'message' => 'Erro ao criar o board de tarefas! Tente atulizar seu plano.',
                'status' => 1
            ] );
    }


    public function delete( Request $request ) {
        $request->validate([ 'id' => 'required|exists:task_boards,id' ]);

        $this->task_board_model->delete_taskboard( $request->input('id') );
    }
}
