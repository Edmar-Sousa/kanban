<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'small_description', 'price' ];


    public function plans_items()
    {
        return $this->hasMany( PlansItem::class, 'plan_id' );
    }


    public function get_plans()
    {
        return $this->with( 'plans_items' )->get();
    }


    public function get_plan_with_id( int $id )
    {
        return $this->where( 'id', $id )->first();
    }
}
