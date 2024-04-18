<?php

declare(strict_types=1);

namespace App\Core\ValueObject;

use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\Interfaces\IUuid;
use Ramsey\Uuid\Uuid as RamseyUuid;

final readonly class Uuid implements IUuid
{
    use ToStringJson;

    private function __construct(
        private string $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(IUuid $other): bool
    {
        return $this->value === $other->getValue();
    }

    public static function random(): IUuid
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public static function validate(string $value): bool
    {
        if ($value === '') {
            return false;
        }

        return RamseyUuid::isValid($value);
    }

    /**
     * @throws \App\Core\Exceptions\Interfaces\IValueObjectException
     */
    public static function create(string $value): IUuid
    {
        if (! self::validate($value)) {
            throw ValueObjectException::invalidValue(self::class, $value);
        }

        return new self($value);
    }
}
