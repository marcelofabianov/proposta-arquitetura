<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Marcelofabianov\MyMoney\Domain\Core\Exceptions\DomainCoreValueObjectException;
use Marcelofabianov\MyMoney\Domain\Core\Exceptions\Ports\DomainCoreValueObjectExceptionInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\InactivatedAtInterface;

final readonly class InactivatedAt implements InactivatedAtInterface
{
    private const string DEFAULT_FORMAT = 'Y-m-d H:i:s';

    private function __construct(
        private ?DateTimeInterface $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value ? $this->value->format(self::DEFAULT_FORMAT) : '';
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    public function getValue(): ?DateTimeInterface
    {
        return $this->value;
    }

    public function toIso8601(): string|null
    {
        return $this->value?->format(DateTimeInterface::ATOM);
    }

    public function format(string $format = self::DEFAULT_FORMAT): string|null
    {
        if ($this->value === null) {
            return null;
        }

        try {
            return $this->value?->format($format);
        } catch (Exception) {
            return null;
        }
    }

    public function isNull(): bool
    {
        return $this->value === null;
    }

    public function isNotNull(): bool
    {
        return $this->value !== null;
    }

    public static function nullable(): InactivatedAtInterface
    {
        return new self(null);
    }

    /**
     * @throws Exception
     */
    public static function random(): InactivatedAtInterface
    {
        $random = (new DateTime())
            ->setDate(random_int(2000, (int) date('Y')), random_int(1, 12), random_int(1, 28));

        return new self($random);
    }

    public static function now(): InactivatedAtInterface
    {
        return new self(new DateTime());
    }

    /**
     * @throws Exception
     */
    public static function validate(string|DateTimeInterface $value): bool
    {
        if ($value === '') {
            return false;
        }

        if ($value instanceof DateTimeInterface) {
            return true;
        }

        try {
            new DateTimeImmutable($value);
        } catch (Exception) {
            return false;
        }

        return true;
    }

    /**
     * @throws DomainCoreValueObjectExceptionInterface
     * @throws Exception
     */
    public static function create(string|null|DateTimeInterface $value): InactivatedAtInterface
    {
        if ($value === null) {
            return new self(null);
        }

        if (! self::validate($value)) {
            throw DomainCoreValueObjectException::invalidValueObject(self::class);
        }

        if ($value instanceof DateTimeInterface) {
            return new self($value);
        }

        return new self(new DateTimeImmutable($value));
    }
}
