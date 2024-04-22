<?php

declare(strict_types=1);

namespace App\Core\Service\Interfaces;

use App\User\Domain\UseCase\CreateNewUser\Interfaces\IPasswordHashService as ICreateNewUserPasswordHashService;

interface IPasswordHashService extends ICreateNewUserPasswordHashService
{
}
