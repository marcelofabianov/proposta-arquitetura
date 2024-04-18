<?php

declare(strict_types=1);

namespace App\Core\ValueObject;

use App\Core\Exceptions\Interfaces\IValueObjectException;
use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;

final readonly class UpdatedAt implements IUpdatedAt
{
    use ToStringJson;

    private const string DEFAULT_FORMAT = 'Y-m-d H:i:s';

    private function __construct(
        private DateTimeInterface $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value->format(self::DEFAULT_FORMAT);
    }

    public function getValue(): DateTimeInterface
    {
        return $this->value;
    }

    public function toIso8601(): string
    {
        return $this->value->format(DateTimeInterface::ATOM);
    }

    public function format(string $format = self::DEFAULT_FORMAT): string|null
    {
        try {
            return $this->value->format($format);
        } catch (Exception) {
            return null;
        }
    }

    /**
     * @throws Exception
     */
    public static function random(): IUpdatedAt
    {
        $random = (new DateTime())
            ->setDate(random_int(2000, (int) date('Y')), random_int(1, 12), random_int(1, 28));

        return new self($random);
    }

    public static function now(): IUpdatedAt
    {
        return new self(new DateTimeImmutable());
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
    public static function create(string|DateTimeInterface $value): IUpdatedAt
    {
        if (! self::validate($value)) {
            throw ValueObjectException::invalidValue('UpdatedAt', $value);
        }

        if ($value instanceof DateTimeInterface) {
            return new self($value);
        }

        return new self(new DateTimeImmutable($value));
    }
}
