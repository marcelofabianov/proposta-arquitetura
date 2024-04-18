<?php

declare(strict_types=1);

namespace App\User\Domain\UseCase\CreateNewUser\Interfaces;

use App\Core\ValueObject\Interfaces\IPassword;

interface IPasswordHashService
{
    public function hash(IPassword $password): string;
}
