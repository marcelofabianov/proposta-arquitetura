<?php

declare(strict_types=1);

namespace App\Core\Exceptions;

use App\Core\Exceptions\Interfaces\IValueObjectException;

class ValueObjectException extends CoreException implements IValueObjectException
{
    public static function invalidValue(string $valueObject, ?string $value = null): IValueObjectException
    {
        return new self(sprintf('Invalid value for %s: %s', $valueObject, $value ?? ''));
    }
}
