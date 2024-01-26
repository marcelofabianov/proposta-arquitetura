<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Ports;

use Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;
use Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Adapters\UserEntityInterface;

interface RegisterUserUseCaseInterface
{
    public function __construct(
        RegisterUserRepositoryInterface $registerUserRepository,
        UserEntityInterface $user
    );

    public function execute(RegisterUserDtoInterface $dto): UserEntityInterface;
}
