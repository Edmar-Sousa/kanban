<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskBoards extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];


    /**
     *   This function return the TaskBoards with task
     * 
     *   @return Illuminate\Database\Eloquent\Collection[]  Return a collection from tasks
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'taskboard_id', 'id');
    }


    /**
     *   This function return the taskboard with id and task from taskboard
     * 
     *   @param int $id  The is of task board to get
     * 
     *   @return Illuminate\Database\Eloquent\Model  Return the taskboard data
     */
    public function get_task_board_with_tasks( int $id )
    {
        return $this->where('id', $id)
                    ->with('tasks')
                    ->first();
    }


    /**
     *   This function will count the taskboard of user with id 
     * 
     *   @return int  The number of records in the database
     */
    public function count_boards_user( int $id )
    {
        return $this->where( 'user_id', $id )
            ->count();
    }


    /**
     *   This get all taskboard of user
     * 
     *   @param int $user_id  The user id to find taskboard
     * 
     *   @return Illuminate\Database\Eloquent\Collection[]  Return array of collections with taskboard data
     */
    public function get_task_board_user(int $user_id)
    {
        return $this->where('user_id', $user_id)
                    ->get();
    }


    /**
     *   This function will create a new register of taskboard in database
     * 
     *   @param array $task_board_data  The data of task board to register
     *   @param int $user_id  The id of user that create task board
     * 
     *   @return Illuminate\Database\Eloquent\Model  Return a model with data of new register
     * 
     *   @throws Illuminate\Database\QueryException  Return an exception in case of failure
     */
    public function create_taskboard( array $task_board_data, int $user_id )
    {
        return $this->create([
            'user_id' => $user_id,
            'title' => $task_board_data['title'], 
            'description' => $task_board_data['description'], 
        ]);
    }


    /**
     *   This function will delete the register of taskboard with id
     * 
     *   @param int $id  The id of taskboard to delete
     */
    public function delete_taskboard( int $id )
    {
        return $this->where('id', $id)
                    ->delete();
    }
}
