<?php

namespace App\Exceptions;

use Exception;


class CustomException extends Exception
{

    private string $errorId;
    private array $messages;


    public function __construct(string $errorId, int $statusCode, string $message, array $messages = [])
    {
        parent::__construct($message, $statusCode);

        $this->errorId = $errorId;
        $this->messages = $messages;
    }



    public final function errorObject(): array
    {
        return [
            'code' => $this->errorId,
            'status' => $this->code,
            'errors' => $this->messages,
        ];
    }
}

