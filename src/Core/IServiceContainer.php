<?php

declare(strict_types=1);

namespace App\Core;

use DI\ContainerBuilder;

interface IServiceContainer
{
    public function register(ContainerBuilder $builder): ContainerBuilder;
}
