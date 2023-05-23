<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
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


    public function getAuthPassword()
    {
        return $this->email;
    }
    
    public function withPlan()
    {
        return $this->belongsTo( Plans::class, 'plan_id', 'id' );
    }

    public function store(array $userdata)
    {
        return $this->create([
            'name'     => $userdata['username'],
            'email'    => $userdata['email'],
            'password' => Hash::make($userdata['password']), 
        ]);
    }


    public function find_by_email(string $email)
    {
        return $this->where('email', $email)->first();
    }


    public function update_user(int $id, array $data, string $image_path)
    {
        return $this->where('id', $id)
                    ->update([
                        'name'     =>  $data['username'],
                        'image'    =>  $image_path,
                    ]);
    }
}
