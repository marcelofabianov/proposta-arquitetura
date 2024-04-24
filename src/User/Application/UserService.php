<?php

declare(strict_types=1);

namespace App\User\Application;

use App\Core\ValueObject\Interfaces\IEmail;
use App\Core\ValueObject\Interfaces\IUuid;
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

    public function updateUser(IUuid $userId, ICreateUserDto $dto): IUser
    {
        //
    }

    public function deleteUser(IUuid $userId): void
    {
        //
    }

    public function archiveUser(IUuid $userId): void
    {
        //
    }

    public function reactivateUser(IUuid $userId): void
    {
        //
    }

    public function getUsers(): array
    {
        //
    }

    public function getUser(IUuid $userId): IUser
    {
        //
    }

    public function getUserByEmail(IEmail $email): IUser
    {
        //
    }
}
