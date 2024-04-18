<?php

declare(strict_types=1);

namespace App\User\Domain\UseCase\CreateNewUser\Interfaces;

use App\User\Domain\Entity\Interfaces\IUser;

interface ICreateNewUserRepository
{
    public function create(IUser $user): void;
}
