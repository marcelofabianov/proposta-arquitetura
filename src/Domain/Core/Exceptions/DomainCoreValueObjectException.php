<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\Exceptions;

use Marcelofabianov\MyMoney\Domain\Core\Exceptions\Enums\ExceptionCodeEnum;
use Marcelofabianov\MyMoney\Domain\Core\Exceptions\Ports\DomainCoreValueObjectExceptionInterface;

class DomainCoreValueObjectException extends DomainCoreException implements DomainCoreValueObjectExceptionInterface
{
    public static function invalidValueObject(
        string $valueObject,
        string $message = 'Value Object is invalid',
        ExceptionCodeEnum $code = ExceptionCodeEnum::INVALID_VALUE_OBJECT
    ): DomainCoreValueObjectExceptionInterface {
        return new self($message, $code->value);
    }
}
