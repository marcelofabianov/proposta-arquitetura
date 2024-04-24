<?php

declare(strict_types=1);

namespace App\User\Application\Service\Interfaces;

use App\Core\ValueObject\Interfaces\IEmail;
use App\Core\ValueObject\Interfaces\IUuid;
use App\User\Domain\Entity\Interfaces\ICreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserUseCase;

interface IUserService
{
    public function __construct(ICreateNewUserUseCase $createNewUser);

    public function createNewUser(ICreateUserDto $dto): IUser;

    public function updateUser(IUuid $userId, ICreateUserDto $dto): IUser;

    public function deleteUser(IUuid $userId): void;

    public function archiveUser(IUuid $userId): void;

    public function reactivateUser(IUuid $userId): void;

    public function getUsers(): array;

    public function getUser(IUuid $userId): IUser;

    public function getUserByEmail(IEmail $email): IUser;
}
