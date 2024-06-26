<?php

declare(strict_types=1);

namespace App\Core\Exceptions;

use App\Core\Exceptions\Interfaces\ICoreException;
use Exception;

class CoreException extends Exception implements ICoreException
{
    public function __construct(string $message = '', int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
