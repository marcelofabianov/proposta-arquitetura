<?php

declare(strict_types=1);

namespace App\User\Domain\UseCase\CreateNewUser;

use App\Core\ValueObject\Password;
use App\User\Domain\Entity\Interfaces\ICreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Domain\Entity\User;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserRepository;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserUseCase;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\IPasswordHashService;

final readonly class CreateNewUserUseCase implements ICreateNewUserUseCase
{
    public function __construct(
        private ICreateNewUserRepository $createNewUserRepository,
        private IPasswordHashService $passwordHashService
    ) {
    }

    public function execute(ICreateUserDto $dto): IUser
    {
        $user = User::create($dto);
        $hash = $this->passwordHashService->hash($user->getPassword());

        $user->changePassword(Password::create($hash));

        $this->createNewUserRepository->create($user);

        return $user;
    }
}
