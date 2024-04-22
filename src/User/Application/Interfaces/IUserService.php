<?php

declare(strict_types=1);

namespace App\User\Application\Interfaces;

use App\User\Domain\Entity\Interfaces\ICreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserUseCase;

interface IUserService
{
    public function __construct(
        ICreateNewUserUseCase $createNewUser
    );

    public function createNewUser(ICreateUserDto $dto): IUser;
}
