<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\Exceptions\Ports;

use Marcelofabianov\Ddd\Domain\Core\Exceptions\Enums\ExceptionCodeEnum;

interface DomainCoreEntityCoreExceptionInterface extends DomainCoreExceptionInterface
{
    public static function invalidEntity(
        string $entity,
        string $message = 'Entity is invalid',
        ExceptionCodeEnum $code = ExceptionCodeEnum::INVALID_ENTITY
    ): self;
}
