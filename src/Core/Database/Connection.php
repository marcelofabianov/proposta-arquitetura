<?php

declare(strict_types=1);

namespace App\Core\Database;

use App\Core\Database\Interfaces\IConnection;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterInterface;

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
}
