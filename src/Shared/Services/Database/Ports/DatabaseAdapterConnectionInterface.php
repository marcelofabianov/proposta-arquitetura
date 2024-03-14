<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Shared\Services\Database\Ports;

interface DatabaseAdapterConnectionInterface
{
    public function getDsn(): string;

    public function getOptions(): array;

    public function getUsername(): string;

    public function getPassword(): string;

    public function __wakeup();

    public function __toString(): string;

    public function __clone();

    public function insert(string $table, array $data): string;
}
