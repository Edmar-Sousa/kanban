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

}
