<?php

namespace App\Models;

use App\Constants\PaymentsMethods;
use App\Constants\PaymentsStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'method',
        'extern_id',
        'status',
        'plan_id',
        'user_id',
    ];



    public function getStatusAttribute($value)
    {
        return match ($value) {
            'created', 'pedding' => PaymentsStatus::PENDDING->value,
            'canceled' => PaymentsStatus::CANCELED->value,
            'confirmed' => PaymentsStatus::CONFIRMED->value,
        };
    }


    public function plan()
    {
        return $this->hasOne(Plans::class, 'id', 'plan_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function isPaymentFromUser(int $userId): bool
    {
        return $this->user()->id == $userId;
    }

    public function createCreditCardTransaction(array $data)
    {
        return $this->create([
            'method' => PaymentsMethods::CREDIT_CARD->value,
            'status' => PaymentsStatus::CREATED->value,

            'plan_id' => $data['planId'],
            'user_id' => $data['userId'],
        ]);
    }




    public function updateCreditCardTransaction(string $id, array $data)
    {
        return $this->where('id', $id)
            ->update([
                'status' => $data['status'],
                'extern_id' => $data['externId'],
            ]);
    }


    public function checkStatusTransaction(string $id)
    {
        return $this->where('id', $id)
            ->with('plan')
            ->first();
    }

}
