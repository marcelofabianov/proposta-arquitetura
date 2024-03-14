<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Infrastructure\Persistence;

use Marcelofabianov\MyMoney\Core\Infrastructure\Persistence\Repository;
use Marcelofabianov\MyMoney\Domain\User\Entities\Ports\UserEntityInterface;
use Marcelofabianov\MyMoney\User\Infrastructure\Persistence\Ports\UserRepositoryInterface;

final class UserRepository extends Repository implements UserRepositoryInterface
{
    private const string TABLE = 'users';

    public function save(UserEntityInterface $user): UserEntityInterface
    {
        $this->getConnection()->insert(self::TABLE, $user->toArray());
        $this->getConnection()->closeConnection();

        return $user;
    }
}
