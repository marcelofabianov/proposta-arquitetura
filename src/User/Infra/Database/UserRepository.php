<?php

declare(strict_types=1);

namespace App\User\Infra\Database;

use App\Core\Database\Interfaces\IConnection;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Infra\Database\Interfaces\IUserRepository;

final readonly class UserRepository implements IUserRepository
{
    public function __construct(
        private IConnection $connection
    ) {
    }

    public function create(IUser $user): void
    {
        // TODO: Implement create() method.
    }
}
