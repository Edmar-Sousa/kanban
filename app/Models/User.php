<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'address_id',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->id,
        ];
    }


    public function getAuthPassword()
    {
        return $this->email;
    }
    

    /**
     *   This function return the user with the plan activite
     * 
     *   @return Illuminate\Database\Eloquent\QueryBuilder  Return a query builder to select data
     */
    public function withPlan()
    {
        return $this->belongsTo( Plans::class, 'plan_id', 'id' );
    }


    /**
     *   This function will create a new register of user in database
     * 
     *   @param array $userdata  The data of user to register in database
     * 
     *   @return Illuminate\Database\Eloquent\Model  The model with data registred in database
     * 
     *   @throws Illuminate\Database\QueryException  Return a exception in case of failure
     */
    public function store(array $userdata)
    {
        return $this->create([
            'name'     => $userdata['username'],
            'email'    => $userdata['email'],
            'password' => Hash::make($userdata['password']), 
        ]);
    }


    /**
     *   Find and return the first user with email in database
     * 
     *   @param string $email  The email of user to find
     * 
     *   @return Illuminate\Database\Eloquent\Model|null  Return a model with data from user or null
     */
    public function find_by_email(string $email)
    {
        return $this->where('email', $email)->first();
    }


    /**
     *   Update the register from user with id
     * 
     *   @param int $id  The id of user to update data
     *   @param array $data  The data to update register
     *   @param string $image_path  The image from uploaded file
     * 
     *   @return Illuminate\Database\Eloquent\Model  The model with data of register
     */
    public function update_user(int $id, array $data, string $image_path)
    {
        return $this->where('id', $id)
            ->update([
                'name'     =>  $data['username'],
                'image'    =>  $image_path,
            ]);
    }


    /**
     *   The function to update of column plan_id of user
     * 
     *   @param int $user_id  The user id to update column
     *   @param int $plan_id  The id of plan
     * 
     *   @throws Illuminate\Database\QueryExcption  Return a excption in case of failure
     */
    public function update_plan( int $user_id, int $plan_id )
    {
        return $this->where( 'id', $user_id )
            ->update( [
                'plan_id' => $plan_id
            ] );
    }
}
