<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Ports;

use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;
use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Adapters\UserEntityInterface;

interface RegisterUserUseCaseInterface
{
    public function __construct(
        RegisterUserRepositoryInterface $registerUserRepository,
        UserEntityInterface $user
    );

    public function execute(RegisterUserDtoInterface $dto): UserEntityInterface;
}
