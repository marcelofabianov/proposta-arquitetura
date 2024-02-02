<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects;

use Exception;
use Marcelofabianov\MyMoney\Domain\Core\Exceptions\DomainCoreValueObjectException;
use Marcelofabianov\MyMoney\Domain\Core\Exceptions\Ports\DomainCoreValueObjectExceptionInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\PasswordInterface;

final class Password implements PasswordInterface
{
    private const int MIN_LENGTH = 8;

    private const int MAX_LENGTH = 24;

    private const bool PASSWORD_CONTAINS_LETTER = true;

    private const bool PASSWORD_CONTAINS_NUMBER = true;

    private const bool PASSWORD_CONTAINS_SYMBOL = true;

    private const bool PASSWORD_CONTAINS_SPACES = false;

    private static string $message;

    private function __construct(
        private readonly string $value
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

    public function equals(PasswordInterface $other): bool
    {
        return $this->value === $other->getValue();
    }

    private static function validateSymbols(string $value): bool
    {
        return preg_match('/[~!#$%^&*()-_.,<>?\/\\{}[\]|:;]+/', $value) > 0;
    }

    private static function validateNumbers(string $value): bool
    {
        return preg_match('/\d+/', $value) > 0;
    }

    private static function validateLettersUppercase(string $value): bool
    {
        return preg_match('/[A-Z]+/', $value) > 0;
    }

    private static function validateLettersLowercase(string $value): bool
    {
        return preg_match('/[a-z]+/', $value) > 0;
    }

    private static function validateSpaces(string $value): bool
    {
        return !str_contains($value, ' ');
    }

    private static function validateEmpty(string $value): bool
    {
        return !empty($value);
    }

    private static function validateLength(string $value): bool
    {
        $length = strlen($value);

        return $length >= self::MIN_LENGTH && $length <= self::MAX_LENGTH;
    }

    public static function validate(string $value): bool
    {
        if (! self::validateSpaces($value)) {
            self::$message = 'Password must not contain spaces';

            return false;
        }

        if (! self::validateEmpty($value)) {
            self::$message = 'Password must not be empty';

            return false;
        }

        if (! self::validateLettersLowercase($value)) {
            self::$message = 'Password must contain at least one lowercase letter';

            return false;
        }

        if (! self::validateLettersUppercase($value)) {
            self::$message = 'Password must contain at least one uppercase letter';

            return false;
        }

        if (! self::validateNumbers($value)) {
            self::$message = 'Password must contain at least one number';

            return false;
        }

        if (! self::validateSymbols($value)) {
            self::$message = 'Password must contain at least one symbol';

            return false;
        }

        if (! self::validateLength($value)) {
            self::$message = 'Password must be between 8 and 24 characters';

            return false;
        }

        return true;
    }

    public static function getMessage(): string
    {
        return self::$message;
    }

    /**
     * @throws Exception
     */
    public static function random(): PasswordInterface
    {
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '~!#$%^&*()-_./<>?/\\{}[]|:;';

        $random = [];

        for ($i = 0; $i < random_int(4, 8); ++$i) {
            $random[] = $lowercase[random_int(0, strlen($lowercase) - 1)];
            $random[] = $uppercase[random_int(0, strlen($uppercase) - 1)];
            $random[] = $numbers[random_int(0, strlen($numbers) - 1)];
            $random[] = $specialChars[random_int(0, strlen($specialChars) - 1)];
        }

        $random = implode('', $random);

        if (! self::validate($random)) {
            throw DomainCoreValueObjectException::invalidValueObject(self::class, 'Password invalid.');
        }

        return self::create($random);
    }

    /**
     * @throws DomainCoreValueObjectExceptionInterface
     */
    public static function create(string|PasswordInterface $value): PasswordInterface
    {
        if ($value instanceof PasswordInterface) {
            return $value;
        }

        if (! self::validate($value)) {
            throw DomainCoreValueObjectException::invalidValueObject(self::class, 'Force password invalid.');
        }

        return new self($value);
    }
}
