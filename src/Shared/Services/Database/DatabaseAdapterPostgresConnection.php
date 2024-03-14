<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Shared\Services\Database;

use Marcelofabianov\MyMoney\Shared\Services\Database\Ports\DatabaseAdapterConnectionInterface;
use PDO;
use RuntimeException;

final readonly class DatabaseAdapterPostgresConnection implements DatabaseAdapterConnectionInterface
{
    private string $dsn;

    public function __construct(
        string $host,
        int $port,
        string $database,
        private string $username,
        private string $password
    )
    {
        $this->dsn = "pgsql:host=$host;port=$port;dbname=$database";
    }

    public function __wakeup()
    {
        throw new RuntimeException('Unserialize is not allowed.');
    }

    public function __toString(): string
    {
        throw new RuntimeException('Object to string is not allowed.');
    }

    public function __clone()
    {
        throw new RuntimeException('Clone is not allowed.');
    }

    public function getDsn(): string
    {
        return $this->dsn;
    }

    public function getOptions(): array
    {
        return [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function insert(string $table, array $data): string
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_map(static fn ($value) => "'$value'", $data));

        return "INSERT INTO $table ($columns) VALUES ($values)";
    }
}
