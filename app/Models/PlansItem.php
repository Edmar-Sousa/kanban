<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read int $id
 * 
 * @property string $title
 * @property int $plan_id
 */
class PlansItem extends Model
{
    /** @use HasFactory<\Database\Factories\PlansItemFactory> */
    use HasFactory;

    protected $fillable = [ 'title', 'plan_id' ];
}
