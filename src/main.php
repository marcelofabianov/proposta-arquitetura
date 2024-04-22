<?php

declare(strict_types=1);

use App\Core\CoreServiceContainer;
use App\User\Application\Interfaces\IUserService;
use App\User\UserServiceContainer;
use DI\ContainerBuilder;

require __DIR__.'/../vendor/autoload.php';

/**
 * @throws Exception
 */
function main(): void
{
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    $containerBuilder = new ContainerBuilder();

    $core = new CoreServiceContainer();
    $user = new UserServiceContainer();

    $containerBuilder = $core->register($containerBuilder);
    $containerBuilder = $user->register($containerBuilder);

    $container = $containerBuilder->build();

    $userService = $container->get(IUserService::class);

    dd($userService);
}
