<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'taskboard_id', 'state'];


    public function update_state( array $task )
    {
        return $this->where( 'id', $task['id'] )
                    ->update( ['state' => $task['state'] ]);
    }


    public function store( array $task )
    {
        return $this->create([
            'taskboard_id' => $task['id'],
            'title' => $task['title'],
            'description' => $task['description'],
            'state' => 1,
        ]);
    }

    public function delete_task( int $id )
    {
        return $this->where('id', $id)->delete();
    }
}
