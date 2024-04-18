<?php

declare(strict_types=1);

namespace App\Core\Exceptions\Interfaces;

interface IEntityException extends ICoreException
{
    public static function invalidData(string $entity, ?string $message = null): self;
}
