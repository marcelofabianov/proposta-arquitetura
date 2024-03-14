<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Core\Infrastructure\Persistence;

use Marcelofabianov\MyMoney\Core\Infrastructure\Persistence\Ports\RepositoryInterface;
use Marcelofabianov\MyMoney\Shared\Services\Database\Ports\ConnectionDatabaseInterface;

class Repository implements RepositoryInterface
{
    public function __construct(
        private readonly ConnectionDatabaseInterface $connection
    ) {
    }

    public function getConnection(): ConnectionDatabaseInterface
    {
        return $this->connection;
    }
}
