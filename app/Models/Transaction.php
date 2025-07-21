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
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;


    protected $fillable = [
        'method',
        'extern_id',
        'status',
        'plan_id',
        'user_id',
    ];



    /**
     * @param string $value
     * @return string
     */
    public function getStatusAttribute(string $value): string
    {
        if (in_array($value, ['created', 'pedding']))
            return PaymentsStatus::PENDDING->value;

        else if ($value == 'canceled')
            return PaymentsStatus::CANCELED->value;

        return PaymentsStatus::CONFIRMED->value;
    }


    /**
     * Return the relationship with plan, registred when create
     * a transaction to active plan
     * 
     * @return HasOne<Plans, $this>
     */
    public function plan(): HasOne
    {
        return $this->hasOne(Plans::class, 'id', 'plan_id');
    }


    /**
     * Return the relationship with User
     * 
     * @return HasOne<User, $this>
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @param int $userId
     * @return bool
     */
    public function isPaymentFromUser(int $userId): bool
    {
        $user = $this->user;

        if (!$user)
            return false;

        return $user->id == $userId;
    }


    /**
     * @param array{planId: int, userId: int} $data
     * @return Transaction
     */
    public function createCreditCardTransaction(array $data): Transaction
    {
        return $this->create([
            'method' => PaymentsMethods::CREDIT_CARD->value,
            'status' => PaymentsStatus::CREATED->value,

            'plan_id' => $data['planId'],
            'user_id' => $data['userId'],
        ]);
    }


    /**
     * @param string $id
     * @return Transaction
     */
    public function getTransactionWithId(string $id): Transaction
    {
        return $this->where('id', $id)
            ->firstOrFail();
    }

    /**
     * @param string $id
     * @param array{ status: string, externId?: string } $data
     * 
     * @return Transaction
     */
    public function updateCreditCardTransaction(string $id, array $data): Transaction
    {
        $transaction = $this->getTransactionWithId($id);

        $transaction->status = $data['status'];

        if (isset($data['externId']))
            $transaction->extern_id = $data['externId'];

        $transaction->update();

        return $transaction;
    }


    /**
     * @param string $id
     * @return Transaction|null
     */
    public function checkStatusTransaction(string $id): Transaction | null
    {
        return $this->where('id', $id)
            ->with('plan')
            ->first();
    }

}
