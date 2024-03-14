<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser\Ports;

use Marcelofabianov\MyMoney\Domain\User\Entities\Ports\UserEntityInterface;
use Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;

interface RegisterUserUseCaseInterface
{
    public function __construct(RegisterUserRepositoryInterface $registerUserRepository);

    public function execute(UserEntityInterface $user): UserEntityInterface;
}
