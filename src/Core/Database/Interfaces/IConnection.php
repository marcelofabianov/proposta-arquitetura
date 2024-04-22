<?php

declare(strict_types=1);

namespace App\Core\Database\Interfaces;

use Laminas\Db\Adapter\AdapterInterface;

interface IConnection
{
    public function __construct(AdapterInterface $adapter);

    public function getAdapter(): AdapterInterface;
}
