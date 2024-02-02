<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Infrastructure\Persistence;

use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Adapters\UserEntityInterface;
use Marcelofabianov\MyMoney\User\Infrastructure\Persistence\Ports\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function registerUser(UserEntityInterface $user): UserEntityInterface
    {
        // TODO: Implement registerUser() method.
    }
}
