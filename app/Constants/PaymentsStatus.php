<?php


namespace App\Constants;


enum PaymentsStatus: string
{
    case PENDDING = 'pendding';
    case CREATED = 'created';
    case CONFIRMED = 'confirmed';
    case CANCELED = 'canceled';
}

