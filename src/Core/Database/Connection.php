<?php

declare(strict_types=1);

namespace App\Core\Database;

use App\Core\Database\Interfaces\IConnection;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Insert;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Sql;

final readonly class Connection implements IConnection
{
    private AdapterInterface $adapter;

    public function __construct()
    {
        $this->adapter = new Adapter(Postgres::fromEnv()->toArray());
    }

    public function getAdapter(): AdapterInterface
    {
        return $this->adapter;
    }

    public function getSql(): Sql
    {
        return new Sql($this->adapter);
    }

    public function select(string|null $table = null): Select
    {
        return $this->getSql()->select($table);
    }

    public function insert(string|null $table = null): Insert
    {
        return $this->getSql()->insert();
    }
}
