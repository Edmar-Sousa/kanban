<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskBoards extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];


    public function tasks()
    {
        return $this->hasMany(Task::class, 'taskboard_id', 'id');
    }


    public function get_task_board_with_tasks( int $id )
    {
        return $this->where('id', $id)
                    ->with('tasks')
                    ->first();
    }


    public function count_boards_user( int $id )
    {
        return $this->where( 'user_id', $id )
            ->count();
    }


    public function get_task_board_user(int $user_id)
    {
        return $this->where('user_id', $user_id)
                    ->get();
    }


    public function create_taskboard( array $task_board_data, int $user_id )
    {
        return $this->create([
            'user_id' => $user_id,
            'title' => $task_board_data['title'], 
            'description' => $task_board_data['description'], 
        ]);
    }

    public function delete_taskboard( int $id )
    {
        return $this->where('id', $id)
                    ->delete();
    }
}
