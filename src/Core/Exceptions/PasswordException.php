<?php

declare(strict_types=1);

namespace App\Core\Exceptions;

use App\Core\Exceptions\Interfaces\IPasswordException;

final class PasswordException extends CoreException implements IPasswordException
{
    public static function badPassword(string $message): IPasswordException
    {
        return new self($message);
    }
}
