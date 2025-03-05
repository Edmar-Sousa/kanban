<?php

namespace App\Constants;

enum Subscription: string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case CANCELED = 'canceled';
    case EXPIRED = 'expired';
}
