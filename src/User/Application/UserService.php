<?php

declare(strict_types=1);

namespace App\User\Application;

use App\User\Application\Interfaces\IUserService;
use App\User\Domain\Entity\Interfaces\ICreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserUseCase;

final readonly class UserService implements IUserService
{
    public function __construct(
        private ICreateNewUserUseCase $createNewUser
    ) {
    }

    public function createNewUser(ICreateUserDto $dto): IUser
    {
        return $this->createNewUser->execute($dto);
    }
}
