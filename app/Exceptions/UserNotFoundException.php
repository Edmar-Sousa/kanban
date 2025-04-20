<?php

namespace App\Exceptions;

use Exception;

class UserNotFoundException extends CustomException
{
    
    public function __construct(string $message, array $messages = [])
    {
        parent::__construct(
            'user_not_found',
            404,
            $message,
            $messages
        );
    }

}
