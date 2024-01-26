<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\Exceptions;

use Marcelofabianov\Ddd\Domain\Core\Exceptions\Enums\ExceptionCodeEnum;
use Marcelofabianov\Ddd\Domain\Core\Exceptions\Ports\DomainCoreEntityCoreExceptionInterface;

class DomainEntityCoreException extends DomainCoreException implements DomainCoreEntityCoreExceptionInterface
{
    public static function invalidEntity(
        string $entity,
        string $message = 'Entity is invalid',
        ExceptionCodeEnum $code = ExceptionCodeEnum::INVALID_ENTITY
    ): DomainCoreEntityCoreExceptionInterface
    {
        return new self($message, $code->value);
    }
}
