<?php

declare(strict_types=1);

namespace App\Core\Exceptions\Interfaces;

interface IValueObjectException extends ICoreException
{
    public static function invalidValue(string $valueObject, ?string $value = null): self;
}
