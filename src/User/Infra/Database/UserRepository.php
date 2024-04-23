<?php

declare(strict_types=1);

namespace App\User\Infra\Database;

use App\Core\Database\Interfaces\IConnection;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Infra\Database\Interfaces\IUserRepository;

final readonly class UserRepository implements IUserRepository
{
    private const string TABLE = 'users';

    public function __construct(
        private IConnection $connection
    ) {
    }

    public function create(IUser $user): void
    {
        $this->connection->insert(self::TABLE)
            ->values([
                'id' => $user->getId()->toString(),
                'name' => $user->getName(),
                'email' => $user->getEmail()->toString(),
                'password' => $user->getPassword()->toString(),
                'created_at' => $user->getAudit()->getCreatedAt()->toString(),
                'updated_at' => $user->getAudit()->getUpdatedAt()->toString(),
                'deleted_at' => $user->getAudit()->getArchivedAt()?->toString(),
                'archived_at' => $user->getAudit()->getArchivedAt()?->toString(),
            ]);
    }
}
