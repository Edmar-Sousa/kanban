<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivityPlan extends Model
{

    protected $table = [
        'user_id',
        'plan_id',
        'sign_at',
        'expire_at',
    ];

}
