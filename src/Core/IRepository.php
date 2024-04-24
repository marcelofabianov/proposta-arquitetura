<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Database\Interfaces\IConnection;

interface IRepository
{
    public function __construct(IConnection $connection);
}
