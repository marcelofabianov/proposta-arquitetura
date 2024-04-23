<?php

declare(strict_types=1);

namespace App\Core\Database;

use App\Core\Database\Interfaces\IDatabaseConfig;

final readonly class Postgres implements IDatabaseConfig
{
    private function __construct(
        private string $driver,
        private string $hostname,
        private string $port,
        private string $database,
        private string $username,
        private string $password,
        private string $charset,
    ) {
    }

    public static function fromEnv(): IDatabaseConfig
    {
        $driver = $_ENV['DB_DRIVER'] ?? null;
        $database = $_ENV['DB_DATABASE'] ?? null;
        $username = $_ENV['DB_USERNAME'] ?? null;
        $password = $_ENV['DB_PASSWORD'] ?? null;
        $hostname = $_ENV['DB_HOSTNAME'] ?? 'localhost';
        $port = $_ENV['DB_PORT'] ?? '5432';
        $charset = $_ENV['DB_CHARSET'] ?? 'utf8';

        if ($driver === null || $database === null || $username === null || $password === null) {
            throw new \RuntimeException('Missing database configuration');
        }

        return new self(
            driver: $driver,
            hostname: $hostname,
            port: $port,
            database: $database,
            username: $username,
            password: $password,
            charset: $charset,
        );
    }

    public function toArray(): array
    {
        return [
            'driver' => $this->driver,
            'hostname' => $this->hostname,
            'port' => $this->port,
            'database' => $this->database,
            'username' => $this->username,
            'password' => $this->password,
            'charset' => $this->charset,
        ];
    }
}
