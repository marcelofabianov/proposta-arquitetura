<?php

declare(strict_types=1);

namespace App\User\Infra\Database\Interfaces;

use App\Core\IRepository;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserRepository;

interface IUserRepository extends IRepository, ICreateNewUserRepository
{
}
