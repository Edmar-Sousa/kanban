<?php

namespace App\Models;

use App\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * 
 * @property int destination_user
 * @property int source_user
 * @property int status
 * 
 * @property-read User $source_user_data
 * @property-read User $destination_user_data
 */
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


    public function list_friends(int $id)
    {
        return $this->select([
            'id',
            'destination_user',
            'source_user',
            'status',
        ])
            ->where(
                fn($query) =>
                $query->where('destination_user', $id)
                    ->orWhere('source_user', $id)
            )
            ->where('status', self::STATUS_ACEPTED)

            ->with([
                'source_user_data' => fn($query) => $query->select(['id', 'name', 'email', 'image']),
                'destination_user_data' => fn($query) => $query->select(['id', 'name', 'email', 'image']),
            ])
            ->where('status', self::STATUS_ACEPTED)
            ->get();
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


    public function alredy_exists_invite(int $source, int $destination)
    {
        return $this->where('destination_user', $destination)
            ->where('source_user', $source)
            ->where('status', self::STATUS_INVITED)
            ->exists();
    }

    public function find_user_invites(int $id)
    {
        return $this->where('destination_user', $id)
            ->where('status', self::STATUS_INVITED)
            ->with([
                'source_user_data'
            ])
            ->paginate(10);
    }


    /**
     * Return the friend with id informed
     * 
     * @param int $id
     * @throws \App\Exceptions\UserNotFoundException
     * @return Friends
     */
    public function getById(int $id): Friends
    {
        $friend = $this->where('id', $id)->first();

        if ($friend == null) {
            throw new UserNotFoundException(
                'User with id not found', [
                    'friend' => 'Usuario não encontrado.'
            ]);
        }

        return $friend;
    }


    public function accept_invite(int $id)
    {
        return $this->where('id', $id)
            ->update([
                'status' => self::STATUS_ACEPTED,
            ]);
    }
}
