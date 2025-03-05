<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanRules extends Model
{
    use HasFactory;

    protected $fillable = [ 'limit_boards', 'limit_users', 'limit_reports', 'plan_id' ];


    public function getIsPremiumAttribute()
    {
        return $this->limit_boards == 0 && $this->limit_users == 0 && $this->limit_reports == 0;
    }

}
