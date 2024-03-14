<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Shared\Services\Database\Ports;

use PDO;

interface ConnectionDatabaseInterface
{
    public function __clone();

    public function __wakeup();

    public function __destruct();

    public function __toString(): string;

    public function getConnection(): PDO;

    public function closeConnection(): void;

    public function executeQuery(string $query, array $params = []): bool;

    public static function getInstance(DatabaseAdapterConnectionInterface $adapter): ConnectionDatabaseInterface;

    public function insert(string $table, array $values): void;
}
