<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\User\Infrastructure\Persistence;

use Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Adapters\UserEntityInterface;
use Marcelofabianov\Ddd\User\Infrastructure\Persistence\Ports\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function registerUser(UserEntityInterface $user): UserEntityInterface
    {
        // TODO: Implement registerUser() method.
    }
}
