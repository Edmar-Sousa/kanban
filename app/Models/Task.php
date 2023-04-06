<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'state'];


    public function get_all_tasks()
    {
        return $this->all();
    }


    public function update_state( array $task )
    {
        return $this->where( 'id', $task['id'] )
                    ->update( ['state' => $task['state'] ]);
    }
}
