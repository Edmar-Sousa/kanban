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


}
