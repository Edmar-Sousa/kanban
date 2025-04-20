<?php

namespace App\Exceptions;

use Exception;


class CustomException extends Exception
{

    private string $errorId;

    /** @var array<string, string> */
    private array $messages;


    /**
     * Class to reprer the custom exception
     * 
     * @param string $errorId
     * @param int $statusCode
     * @param string $message
     * @param array<string, string> $messages 
     */
    public function __construct(string $errorId, int $statusCode, string $message, array $messages = [])
    {
        parent::__construct($message, $statusCode);

        $this->errorId = $errorId;
        $this->messages = $messages;
    }



    /**
     * Function to return an array from error
     * 
     * @return array{code: string, errors: array<string, string>, status: int}
     */
    public final function errorObject(): array
    {
        return [
            'code' => $this->errorId,
            'status' => $this->code,
            'errors' => $this->messages,
        ];
    }
}

