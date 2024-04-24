<?php

declare(strict_types=1);

namespace App\Core\Database\Interfaces;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Sql;

interface IConnection
{
    public function __construct();

    public function getAdapter(): AdapterInterface;

    public function getSql(): Sql;

    public function select(string $table): Select;

    public function insert(string $table, array $values): bool;
}
