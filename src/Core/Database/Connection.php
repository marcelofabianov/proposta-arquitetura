<?php

declare(strict_types=1);

namespace App\Core\Database;

use App\Core\Database\Interfaces\IConnection;
use Laminas\Db\Adapter\AdapterInterface;

final readonly class Connection implements IConnection
{
    public function __construct(
        private AdapterInterface $adapter
    ) {
    }

    public function getAdapter(): AdapterInterface
    {
        return $this->adapter;
    }
}
