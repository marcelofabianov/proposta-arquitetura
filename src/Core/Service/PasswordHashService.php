<?php

declare(strict_types=1);

namespace App\Core\Service;

use App\Core\Service\Interfaces\IPasswordHashService;
use App\Core\ValueObject\Interfaces\IPassword;

final class PasswordHashService implements IPasswordHashService
{
    public function hash(IPassword $password): string
    {
        return password_hash($password->getValue(), PASSWORD_DEFAULT);
    }
}
