<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser;

use Marcelofabianov\MyMoney\Domain\User\Entities\Ports\UserEntityInterface;
use Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;
use Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser\Ports\RegisterUserUseCaseInterface;

final readonly class RegisterUserUseCase implements RegisterUserUseCaseInterface
{
    public function __construct(
        private RegisterUserRepositoryInterface $registerUserRepository,
    ) {
    }

    public function execute(UserEntityInterface $user): UserEntityInterface
    {
        return $this->registerUserRepository->save($user);
    }
}
