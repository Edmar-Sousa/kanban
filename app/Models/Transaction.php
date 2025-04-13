<?php

declare(strict_types=1);

namespace App\Models;

use App\Constants\PaymentsMethods;
use App\Constants\PaymentsStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * Class Transaction
 * 
 * @property-read int $id
 * 
 * @property string $extern_id
 * @property string $method
 * @property string $status
 * @property int $plan_id
 * @property int $user_id
 * 
 * @property-read Plans|null $plan
 */
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


    /**
     * Return the relationship with plan, registred when create
     * a transaction to active plan
     * 
     * @return HasOne<Plans, Transaction>
     */
    public function plan(): HasOne
    {
        return $this->hasOne(Plans::class, 'id', 'plan_id');
    }


    /**
     * Return the relationship with User
     * 
     * @return HasOne<User, Transaction>
     */
    public function user(): HasOne
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



    public function getTransactionWithId(string $id)
    {
        return $this->where('id', $id)
            ->firstOrFail();
    }

    public function updateCreditCardTransaction(string $id, array $data)
    {
        $transaction = $this->getTransactionWithId($id);

        $transaction->status = $data['status'];

        if (isset($data['externId']))
            $transaction->extern_id = $data['externId'];

        $transaction->update();

        return $transaction;
    }


    public function checkStatusTransaction(string $id)
    {
        return $this->where('id', $id)
            ->with('plan')
            ->first();
    }

}
