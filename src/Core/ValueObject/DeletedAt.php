<?php

declare(strict_types=1);

namespace App\Core\ValueObject;

use App\Core\Exceptions\Interfaces\IValueObjectException;
use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;

final readonly class DeletedAt implements IDeletedAt
{
    use ToStringJson;

    private const string DEFAULT_FORMAT = 'Y-m-d H:i:s';

    private function __construct(
        private ?DateTimeInterface $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value ? $this->value->format(self::DEFAULT_FORMAT) : '';
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

    public static function nullable(): IDeletedAt
    {
        return new self(null);
    }

    /**
     * @throws Exception
     */
    public static function random(): IDeletedAt
    {
        $random = (new DateTime())
            ->setDate(random_int(2000, (int) date('Y')), random_int(1, 12), random_int(1, 28));

        return new self($random);
    }

    public static function now(): IDeletedAt
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
     * @throws IValueObjectException
     * @throws Exception
     */
    public static function create(string|null|DateTimeInterface $value): IDeletedAt
    {
        if ($value === null) {
            return new self(null);
        }

        if (! self::validate($value)) {
            throw ValueObjectException::invalidValue('DeletedAt', $value);
        }

        if ($value instanceof DateTimeInterface) {
            return new self($value);
        }

        return new self(new DateTimeImmutable($value));
    }
}
