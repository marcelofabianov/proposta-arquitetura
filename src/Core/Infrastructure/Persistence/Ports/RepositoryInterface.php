<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Core\Infrastructure\Persistence\Ports;

use Marcelofabianov\MyMoney\Shared\Services\Database\Ports\ConnectionDatabaseInterface;

interface RepositoryInterface
{
    public function __construct(ConnectionDatabaseInterface $connection);

    public function getConnection(): ConnectionDatabaseInterface;
}
