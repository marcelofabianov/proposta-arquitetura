<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\Exceptions\Ports;

use Marcelofabianov\Ddd\Domain\Core\Exceptions\Enums\ExceptionCodeEnum;

interface DomainCoreValueObjectExceptionInterface extends DomainCoreExceptionInterface
{
    public static function invalidValueObject(
        string $valueObject,
        string $message = 'Value Object is invalid',
        ExceptionCodeEnum $code = ExceptionCodeEnum::INVALID_VALUE_OBJECT
    ): self;
}
