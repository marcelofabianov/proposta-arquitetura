<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\ValueObjects;

use Exception;
use Marcelofabianov\Ddd\Domain\Core\Exceptions\DomainCoreValueObjectException;
use Marcelofabianov\Ddd\Domain\Core\Exceptions\Ports\DomainCoreValueObjectExceptionInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\EmailInterface;

final readonly class Email implements EmailInterface
{
    private function __construct(
        private string|null $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value ?? '';
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    public function getValue(): string|null
    {
        return $this->value;
    }

    public static function nullable(): EmailInterface
    {
        return new self(null);
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }

    public function isNotNull(): bool
    {
        return ! is_null($this->value);
    }

    public function equals(EmailInterface $other): bool
    {
        return $this->getValue() === $other->getValue();
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
    public static function random(): EmailInterface
    {
        $random = bin2hex(random_bytes(16)).'@email.com';

        return self::create($random);
    }

    /**
     * @throws DomainCoreValueObjectExceptionInterface
     */
    public static function create(string|null|EmailInterface $value): EmailInterface
    {
        if (is_null($value)) {
            return new self(null);
        }

        if ($value instanceof EmailInterface) {
            return $value;
        }

        if (is_string($value) && self::validate($value)) {
            return new self($value);
        }

        throw DomainCoreValueObjectException::invalidValueObject(self::class);
    }
}
