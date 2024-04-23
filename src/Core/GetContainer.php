<?php

declare(strict_types=1);

namespace App\Core;

use App\User\UserServiceContainer;
use DI\ContainerBuilder;
use Dotenv\Dotenv;

final class GetContainer
{
    public static function get(): ContainerBuilder
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $containerBuilder = new ContainerBuilder();

        $core = new CoreServiceContainer();
        $user = new UserServiceContainer();

        $containerBuilder = $core->register($containerBuilder);

        return $user->register($containerBuilder);
    }
}
