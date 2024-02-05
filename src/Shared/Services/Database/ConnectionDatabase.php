<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Shared\Services\Database;

use Marcelofabianov\MyMoney\Shared\Services\Database\Ports\ConnectionDatabaseInterface;
use PDO;
use PDOException;
use RuntimeException;

final class ConnectionDatabase implements ConnectionDatabaseInterface
{
    private static ?ConnectionDatabase $instance = null;

    private ?PDO $pdo;

    private function __construct(string $dsn)
    {
        try {
            $this->pdo = new PDO($dsn);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            throw new RuntimeException('Error to connect to database.'. $exception->getMessage());
        }
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

    public static function getInstance(string $dsn): ConnectionDatabaseInterface
    {
        if (self::$instance === null) {
            self::$instance = new self($dsn);
        }

        return self::$instance;
    }
}
