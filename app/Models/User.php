<?php

declare(strict_types=1);

namespace App\Models;

use App\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * 
 * @property-read int $id
 * 
 * @property string $name
 * @property string $email
 * @property string $image
 * @property string $password
 * @property string $document
 * @property string $phone
 * @property string $customer
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'document',
        'phone',
        'customer',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Transaction, $this>
     */
    public function payment()
    {
        return $this->belongsTo(Transaction::class, 'id', 'user_id');
    }


    /**
     * @param int $paymentId
     * @return bool
     */
    public function hasPaymentWithIdAssociated(int $paymentId): bool
    {
        return $this->payment()->where('id', $paymentId)->exists();
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User, $this>
     */
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'source_user', 'destination_user');
    }


    /**
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->email;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Address, $this>
     */
    public function address()
    {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }



    /**
     * @param string $id
     * @return User|null
     */
    public function getUserWithAddress(string $id)
    {
        return $this->where('id', $id)
            ->with('address')
            ->first();
    }



    /**
     *   This function will create a new register of user in database
     *
     * @param array{
     *  username: string,
     *  email: string,
     *  password: string,
     *  document: string,
     *  phone: string,
     * } $userdata
     *
     *   @return User
     */
    public function store(array $userdata): User
    {
        $user = $this->create([
            'name' => $userdata['username'],
            'email' => $userdata['email'],
            'password' => Hash::make($userdata['password']),
            'document' => $userdata['document'],
            'phone' => $userdata['phone'],
        ]);

        return $user;
    }


    /**
     *   Find and return the first user with email in database
     *
     *   @param string $email  The email of user to find
     *
     *   @throws UserNotFoundException If the user not exists in database
     *   @return User  Return a model with data from user or null
     */
    public function findByEmail(string $email): User
    {
        $userWithEmail = $this->where('email', $email)->first();

        if ($userWithEmail == null) {
            throw new UserNotFoundException(
                "Error find user with email: $email", [
                    'email' => 'Usuario com o email informado não existe'
            ]);
        }

        return $userWithEmail;
    }


    /**
     * Update the register from user with id
     *
     * @param int $id  The id of user to update data
     * @param array{
     * 
     * } $data  The data to update register
     *  username: string,
     *  email: string,
     *  password: string,
     *  document: string,
     *  phone: string,
     * @return bool
     */
    public function update_user(int $id, array $data): bool
    {
        $updatedUser = $this->where('id', $id)
            ->update($data);

        return $updatedUser > 0;
    }


    /**
     *   The function to update of column plan_id of user
     *
     *   @param int $user_id  The user id to update column
     *   @param int $plan_id  The id of plan
     *
     */
    public function update_plan(int $user_id, int $plan_id): bool
    {
        $planUpdated = $this->where('id', $user_id)
            ->update([
                'plan_id' => $plan_id
            ]);

        return $planUpdated > 0;
    }



    /**
     * @param int $user_id
     * @param string $customer_id
     * @return bool
     */
    public function update_customer_from_user(int $user_id, string $customer_id): bool
    {
        $updatedCustomer = $this->where('id', $user_id)
            ->update([
                'customer' => $customer_id,
            ]);

        return $updatedCustomer > 0;
    }
}
