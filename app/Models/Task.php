<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'state'];


    public function get_all_tasks_of_user( int $id )
    {
        return $this->where('user_id', $id)->get();
    }


    public function update_state( array $task )
    {
        return $this->where( 'id', $task['id'] )
                    ->update( ['state' => $task['state'] ]);
    }


    public function store( array $task, int $id )
    {
        return $this->create([
            'user_id' => $id,
            'title' => $task['title'],
            'description' => $task['description'],
            'state' => 1,
        ]);
    }
}
