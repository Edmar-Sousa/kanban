<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property-read int $id
 * 
 * @property string $title
 * @property string $description
 * @property int $user_id
 */
class TaskBoards extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];


    /**
     *   This function return the TaskBoards with task
     * 
     *   @return HasMany<Task, TaskBoards>
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'taskboard_id', 'id');
    }


    /**
     *   This function return the taskboard with id and task from taskboard
     * 
     *   @param int $id  The is of task board to get
     */
    public function get_task_board_with_tasks( int $id ): TaskBoards | null
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
     *   @return Collection<int, \App\Models\TaskBoards>  Return array of collections with taskboard data
     */
    public function get_task_board_user(int $user_id): Collection
    {
        return $this->where('user_id', $user_id)
                    ->get();
    }


    /**
     *   This function will create a new register of taskboard in database
     * 
     *   @param array{ title: string, description: string } $task_board_data
     *   @param int $user_id
     */
    public function create_taskboard( array $task_board_data, int $user_id ): TaskBoards
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
     * 
     *   @return bool
     */
    public function delete_taskboard( int $id ): bool
    {
        return $this->where('id', $id)->delete() > 0;
    }
}
