<?php

declare(strict_types=1);

namespace App\User\Infra\Database\Interfaces;

use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserRepository;

interface IUserRepository extends ICreateNewUserRepository
{
}
