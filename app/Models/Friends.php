<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;


    public const STATUS_ACEPTED = 1;
    public const STATUS_DECLINE = 2;
    public const STATUS_INVITED = 3;


    protected $fillable = [
        'destination_user',
        'source_user',
        'status',
    ];



    public function destination_user_data()
    {
        return $this->belongsTo(User::class, 'destination_user', 'id');
    }


    public function source_user_data()
    {
        return $this->belongsTo(User::class, 'source_user', 'id');
    }


    public function remove_friend(int $id, int $logged_user_id)
    {
        $this->where(function ($query) use ($id, $logged_user_id) {
            $query->where('destination_user', $id)
                ->orWhere('destination_user', $logged_user_id);
        })
        ->where(function ($query) use ($id, $logged_user_id) {
            $query->where('source_user', $id)
                ->orWhere('source_user', $logged_user_id);
        })
        ->delete();
    }
}
