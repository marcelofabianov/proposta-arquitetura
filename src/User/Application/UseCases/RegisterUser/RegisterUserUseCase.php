<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser;

use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;
use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Adapters\UserEntityInterface;
use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Ports\RegisterUserDtoInterface;
use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Ports\RegisterUserUseCaseInterface;

final readonly class RegisterUserUseCase implements RegisterUserUseCaseInterface
{

    public function __construct(
        private RegisterUserRepositoryInterface $registerUserRepository,
        private UserEntityInterface $user
    ) {
    }

    public function execute(RegisterUserDtoInterface $dto): UserEntityInterface
    {
        $this->user->setName($dto->name);
        $this->user->setEmail($dto->email);
        $this->user->setPassword($dto->password);

        $this->registerUserRepository->registerUser($this->user);

        return $this->user;
    }
}
