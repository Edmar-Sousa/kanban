<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'small_description', 'price'];


    public $appends = ['isPrimium'];

    public function getIsPrimiumAttribute()
    {
        return $this->plans_rule->limit_boards == 0 && $this->plans_rule->limit_users == 0 && $this->plans_rule->limit_reports == 0;
    }


    /**
     *   This function get relationship from Plans model and PlansItem Model
     * 
     *   @return Illuminate\Database\Eloquent\Collection[]  Return a collection of PlansItem or empty array
     */
    public function plans_items()
    {
        return $this->hasMany(PlansItem::class, 'plan_id');
    }


    /**
     *   This function will return all plans registred in database
     * 
     *   @return Illuminate\Database\Eloquent\Collection[]  Return a collection of plans or empty array
     */
    public function get_plans()
    {
        return $this->with('plans_items')->get();
    }


    /**
     *   This function get the plan with rule
     * 
     *   @return Illuminate\Database\Eloquent\Model|null  Return a model with rule data or null
     */
    public function plans_rule()
    {
        return $this->hasOne(PlanRules::class, 'plan_id', 'id');
    }


    /**
     *   This function will find and return the plan with id
     * 
     *   @param string $id  The id of plan to find in database
     * 
     *   @return Illuminate\Database\Eloquent\QueryBuilder  Return a query build to get the plan data
     */
    private function get_plan(string $id)
    {
        return $this->select('*')
            ->where('id', $id);
    }


    public function get_plan_with_id(string $id)
    {
        return $this->get_plan($id)
            ->first();
    }


    public function get_plan_with_rules(string $id)
    {
        return $this->get_plan($id)
            ->with(['plans_rule'])
            ->first();
    }
}
