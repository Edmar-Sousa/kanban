<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'taskboard_id', 'state'];


    /**
     *   This function update state colunm from task
     * 
     *   @param array $task  The array with id and state to update
     * 
     *   @return Illuminate\Database\Eloquent\Model  Return a model with data from register
     * 
     *   @throws Illuminate\Database\QueryException  Return a exception in case of failure
     */
    public function update_state( array $task )
    {
        return $this->where( 'id', $task['id'] )
                    ->update( ['state' => $task['state'] ]);
    }


    /**
     *   This fuction will create a new register in database
     * 
     *   @param array $task  Array with task data to create new register
     * 
     *   @return Illuminate\Database\Eloquent\Model  Return the model with data of register
     * 
     *   @throws Illuminate\Database\QueryException  Return an exception in case of failure
     */
    public function store( array $task )
    {
        return $this->create([
            'taskboard_id' => $task['id'],
            'title' => $task['title'],
            'description' => $task['description'],
            'state' => 1,
        ]);
    }


    /**
     *   This function will find and delete the task with id from database
     * 
     *   @param int $id The id of task to delete
     * 
     *   @throws Illuminate\Database\QueryException  Return an exception in case of failure
     */
    public function delete_task( int $id )
    {
        return $this->where('id', $id)->delete();
    }
}
