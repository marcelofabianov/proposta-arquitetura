<?php

declare(strict_types=1);

namespace App\User\Domain\UseCase\CreateNewUser\Interfaces;

use App\User\Domain\Entity\Interfaces\ICreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;

interface ICreateNewUserUseCase
{
    public function execute(ICreateUserDto $dto): IUser;
}
