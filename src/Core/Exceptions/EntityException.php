<?php

declare(strict_types=1);

namespace App\Core\Exceptions;

use App\Core\Exceptions\Interfaces\IEntityException;

class EntityException extends CoreException implements IEntityException
{
    public static function invalidData(string $entity, ?string $message = null): IEntityException
    {
        return new self(sprintf('Invalid data for %s: %s', $entity, $message ?? ''));
    }
}
