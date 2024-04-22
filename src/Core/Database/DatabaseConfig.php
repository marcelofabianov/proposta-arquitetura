<?php

declare(strict_types=1);

namespace App\Core\Database;

use App\Core\Database\Interfaces\IDatabaseConfig;

final readonly class DatabaseConfig implements IDatabaseConfig
{
    private function __construct(
        private string $driver,
        private string $dsn,
        private string $username,
        private string $password
    ) {
    }

    public static function fromEnv(): IDatabaseConfig
    {
        $driver = $_ENV['DB_DRIVER'] ?? null;
        $dsn = $_ENV['DB_DNS'] ?? null;
        $username = $_ENV['DB_USERNAME'] ?? null;
        $password = $_ENV['DB_PASSWORD'] ?? null;

        if ($driver === null || $dsn === null || $username === null || $password === null) {
            throw new \RuntimeException('Missing database configuration');
        }

        return new self(
            driver: $driver,
            dsn: $dsn,
            username: $username,
            password: $password,
        );
    }

    public function toArray(): array
    {
        return [
            'driver' => $this->driver,
            'dsn' => $this->dsn,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
