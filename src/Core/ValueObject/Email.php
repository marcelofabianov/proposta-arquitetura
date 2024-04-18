<?php

declare(strict_types=1);

namespace App\Core\ValueObject;

use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\Interfaces\IEmail;
use Exception;

final readonly class Email implements IEmail
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

    public function equals(IEmail $other): bool
    {
        return $this->value === $other->getValue();
    }

    public static function validate(string $email): bool
    {
        if (filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    /**
     * @throws Exception
     */
    public static function random(): IEmail
    {
        $random = bin2hex(random_bytes(16)).'@email.com';

        return self::create($random);
    }

    /**
     * @throws \App\Core\Exceptions\Interfaces\IValueObjectException
     */
    public static function create(string|IEmail $value): IEmail
    {
        if ($value instanceof IEmail) {
            return $value;
        }

        if (! self::validate($value)) {
            throw ValueObjectException::invalidValue('Email', $value);
        }

        return new self($value);
    }
}
