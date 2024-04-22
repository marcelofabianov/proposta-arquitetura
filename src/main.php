<?php

declare(strict_types=1);

use App\Core\CoreServiceContainer;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserUseCase;
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

    $createNewUserUseCase = $container->get(ICreateNewUserUseCase::class);

    dd($createNewUserUseCase);
}
