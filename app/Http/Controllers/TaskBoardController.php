<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\TaskBoardStoreRequest;
use App\Models\Notification;
use App\Models\TaskBoards;
use App\Models\Plans;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;

class TaskBoardController extends Controller
{
    protected TaskBoards $task_board_model;
    protected Plans $plans_model;
    protected Notification $notification_model;

    public function __construct(TaskBoards $task_board, Plans $plans, Notification $notification_model)
    {
        $this->task_board_model = $task_board;
        $this->plans_model = $plans;
        $this->notification_model = $notification_model;
    }


    public function index()
    {
        return Inertia::render('TaskBoard', [
            'id' => Auth::user()->id,
            'image' => Auth::user()->image,
//            'token' => Session::get('jwt_token'),
        ]);
    }

    public function list()
    {
        try {
            $task_boards = $this->task_board_model->get_task_board_user(Auth::user()->id);

            return response()->json([
                'taskboards' => $task_boards,
            ]);
        }

        catch (Exception $error) {
            return response()->json([
                'message' => 'Erro ao buscar os task boards',
            ], 500);
        }
    }

    public function store(TaskBoardStoreRequest $request)
    {
        $plan_user = $this->plans_model->get_plan_with_rules(Auth::user()->plan_id);

        if ($plan_user->isPrimium || $this->task_board_model->count_boards_user(Auth::user()->id) < $plan_user->plans_rule->limit_boards) {
            $this->task_board_model->create_taskboard($request->validated(), Auth::user()->id);

            return redirect()->route('taskboard.index')
                ->with([
                    'message' => 'Board de tarefas criado com sucesso!',
                    'status' => 'success'
                ]);
        }

        return redirect()->route('taskboard.index')
            ->with([
                'message' => 'Erro ao criar o board de tarefas! Tente atualizar seu plano.',
                'status' => 'error'
            ]);
    }


    public function delete(Request $request)
    {
        $request->validate(['id' => 'required|exists:task_boards,id']);

        $this->task_board_model->delete_taskboard($request->input('id'));
    }
}
