<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Shared\Services\Database;

use Marcelofabianov\MyMoney\Shared\Services\Database\Ports\ConnectionDatabaseInterface;
use Marcelofabianov\MyMoney\Shared\Services\Database\Ports\DatabaseAdapterConnectionInterface;
use PDO;
use PDOException;
use RuntimeException;

final class ConnectionDatabase implements ConnectionDatabaseInterface
{
    private static ?ConnectionDatabase $instance = null;

    private ?PDO $pdo;

    private DatabaseAdapterConnectionInterface $adapter;

    private function __construct(PDO $pdo, DatabaseAdapterConnectionInterface $adapter)
    {
        $this->pdo = $pdo;
        $this->adapter = $adapter;
    }

    public function __clone()
    {
        throw new RuntimeException('Clone is not allowed.');
    }

    public function __wakeup()
    {
        throw new RuntimeException('Unserialize is not allowed.');
    }

    public function __toString(): string
    {
        throw new RuntimeException('Object to string is not allowed.');
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }

    public function closeConnection(): void
    {
        $this->pdo = null;
        self::$instance = null;
    }

    public function executeQuery(string $query, array $params = []): bool
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt;
    }

    public function insert(string $table, array $values): void
    {
        $sql = $this->adapter->insert($table, $values);

        $this->executeQuery($sql, $values);
    }

    public static function getInstance(
        DatabaseAdapterConnectionInterface $adapter
    ): ConnectionDatabaseInterface
    {
        try {
            $pdo = new PDO(
                $adapter->getDsn(),
                $adapter->getUsername(),
                $adapter->getPassword(),
                $adapter->getOptions()
            );
        } catch (PDOException $exception) {
            throw new RuntimeException('Error to connect to database.' . $exception->getMessage());
        }

        if (self::$instance === null) {
            self::$instance = new self($pdo, $adapter);
        }

        return self::$instance;
    }
}
