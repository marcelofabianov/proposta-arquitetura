<?php

declare(strict_types=1);

namespace App\Core\Exceptions\Interfaces;

use Exception;
use Throwable;

interface ICoreException extends Throwable
{
    public function __construct(string $message = '', int $code = 0, Exception $previous = null);
}
