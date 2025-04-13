<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property-read int $id
 * 
 * @property int $destination_user
 * @property int $source_user
 * @property string $message
 * @property string $type
 * @property bool $visible
 */
class Notification extends Model
{
    use HasFactory;


    public const TYPE_SYSTEM = 1;
    public const TYPE_INVITE = 2;


    protected $fillable = [
        'destination_user',
        'message',
        'type',
        'source_user',
        'visible'
    ];


    public function source_user_data()
    {
        return $this->belongsTo(User::class, 'source_user', 'id');
    }


    public function store(array $data)
    {
        return $this->create([
            'destination_user' => $data['destination_user'],
            'source_user' => $data['source_user'],

            'message' => $data['message'],
            'type' => $data['type'],
        ]);
    }


    public function count_notification_user(int $user_id)
    {
        return $this->where('destination_user', $user_id)
            ->get();
    }


    public function notifications_with_source_user(int $user_id)
    {
        return $this->where('destination_user', $user_id)
            ->with([
                'source_user_data' => fn($query) => $query->select(['id', 'name', 'image']),
            ])
            ->get();
    }


    public function markview(string $id)
    {
        $this->where('id', $id)
            ->update([
                'visible' => true,
            ]);
    }
}
