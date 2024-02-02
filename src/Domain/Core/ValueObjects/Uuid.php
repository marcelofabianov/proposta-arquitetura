<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects;

use Marcelofabianov\MyMoney\Domain\Core\Exceptions\DomainCoreValueObjectException;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Adapters\UuidGenerateInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\UuidInterface;
use Marcelofabianov\MyMoney\Domain\Core\Exceptions\Ports\DomainCoreValueObjectExceptionInterface;

final readonly class Uuid implements UuidInterface
{
    private function __construct(
        private string $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(UuidInterface $other): bool
    {
        return $this->getValue() === $other->getValue();
    }

    public static function random(UuidGenerateInterface $generate): UuidInterface
    {
        return new self($generate->generate());
    }

    public static function validate(UuidGenerateInterface $generate, string $value): bool
    {
        if ($value === '') {
            return false;
        }

        return $generate->validate($value);
    }

    /**
     * @throws DomainCoreValueObjectExceptionInterface
     */
    public static function create(UuidGenerateInterface $generate, string|UuidInterface $value): UuidInterface
    {
        if ($value instanceof UuidInterface) {
            return $value;
        }

        if (! self::validate($generate, $value)) {
            throw DomainCoreValueObjectException::invalidValueObject(self::class);
        }

        return new self($value);
    }
}
