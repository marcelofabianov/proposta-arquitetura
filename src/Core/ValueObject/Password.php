<?php

declare(strict_types=1);

namespace App\Core\ValueObject;

use App\Core\Exceptions\Interfaces\IPasswordException;
use App\Core\Exceptions\PasswordException;
use App\Core\ValueObject\Interfaces\IPassword;
use Exception;

final class Password implements IPassword
{
    use ToStringJson;

    private const int MIN_LENGTH = 8;

    private const int MAX_LENGTH = 12;

    private static string $message;

    private function __construct(
        private readonly string $value
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

    public function equals(IPassword $other): bool
    {
        return $this->value === $other->getValue();
    }

    public static function validate(string $value): bool
    {
        if (str_contains($value, ' ') || $value === '') {
            self::$message = 'Password cannot contain spaces';

            return false;
        }

        if (! preg_match('/[a-z]/', $value)) {
            self::$message = 'Password must contain at least one lowercase letter';

            return false;
        }

        if (! preg_match('/[A-Z]/', $value)) {
            self::$message = 'Password must contain at least one uppercase letter';

            return false;
        }

        if (! preg_match('/\d/', $value)) {
            self::$message = 'Password must contain at least one number';

            return false;
        }

        if (! preg_match('/[^a-zA-Z0-9]/', $value)) {
            self::$message = 'Password must contain at least one symbol';

            return false;
        }

        if (strlen($value) < self::MIN_LENGTH) {
            self::$message = 'Password must contain at least '.self::MIN_LENGTH.' characters';

            return false;
        }

        return true;
    }

    /**
     * @throws Exception|\Random\RandomException
     */
    public static function random(): IPassword
    {
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '~!#$%^&*()-_./<>?/\\{}[]|:;';

        $loopRandom = random_int(2, 3);
        $random = '';

        for ($i = 0; $i <= $loopRandom; $i++) {
            $random .= $lowercase[random_int(0, strlen($lowercase) - 1)];
            $random .= $uppercase[random_int(0, strlen($uppercase) - 1)];
            $random .= $numbers[random_int(0, strlen($numbers) - 1)];
            $random .= $specialChars[random_int(0, strlen($specialChars) - 1)];
        }

        return self::create($random);
    }

    /**
     * @throws IPasswordException
     */
    public static function create(string|IPassword $value): IPassword
    {
        if ($value instanceof IPassword) {
            return $value;
        }

        if (! self::validate($value)) {
            throw PasswordException::badPassword(self::$message);
        }

        return new self($value);
    }
}
