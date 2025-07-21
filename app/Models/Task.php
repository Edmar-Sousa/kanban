<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read int $id
 * 
 * @property string $name 
 * @property string $description 
 * @property int $taskboard_id 
 * @property int $state
 */
class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'taskboard_id', 'state'];


    /**
     *   This function update state colunm from task
     * 
     *   @param array{id: int, state: int} $task  The array with id and state to update
     * 
     *   @return int
     *   @throws \Illuminate\Database\QueryException  Return a exception in case of failure
     */
    public function update_state( array $task ): int
    {
        return $this->where( 'id', $task['id'] )
                    ->update( ['state' => $task['state'] ]);
    }


    /**
     *   This fuction will create a new register in database
     * 
     *   @param array{id: int, title: string, description: string} $task  Array with task data to create new register
     * 
     *   @return Task  Return the model with data of register
     *   @throws \Illuminate\Database\QueryException  Return an exception in case of failure
     */
    public function store( array $task ): Task
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
     *   @return bool
     *   @throws \Illuminate\Database\QueryException  Return an exception in case of failure
     */
    public function delete_task( int $id ): bool
    {
        return $this->where('id', $id)->delete() > 0;
    }
}
