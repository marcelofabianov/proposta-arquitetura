<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Database\Connection;
use App\Core\Database\Interfaces\IConnection;
use App\Core\Service\Interfaces\IPasswordHashService;
use App\Core\Service\PasswordHashService;
use DI\ContainerBuilder;

final class CoreServiceContainer implements IServiceContainer
{
    public function register(ContainerBuilder $builder): ContainerBuilder
    {
        $builder = $this->service($builder);

        return $this->database($builder);
    }

    private function service(ContainerBuilder $builder): ContainerBuilder
    {
        $builder->addDefinitions([
            IPasswordHashService::class => static function () {
                return new PasswordHashService();
            },
        ]);

        return $builder;
    }

    private function database(ContainerBuilder $builder): ContainerBuilder
    {
        $builder->addDefinitions([
            IConnection::class => function () {
                return new Connection();
            },
        ]);

        return $builder;
    }
}
