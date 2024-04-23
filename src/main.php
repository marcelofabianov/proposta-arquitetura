<?php

declare(strict_types=1);

use App\Core\CoreServiceContainer;
use App\Core\Entity\Audit;
use App\Core\ValueObject\ArchivedAt;
use App\Core\ValueObject\CreatedAt;
use App\Core\ValueObject\DeletedAt;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Password;
use App\Core\ValueObject\UpdatedAt;
use App\Core\ValueObject\Uuid;
use App\User\Application\Interfaces\IUserService;
use App\User\Domain\Entity\Dto\CreateUserDto;
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

    $dto = new CreateUserDto(
        Uuid::random(),
        'John Doe',
        Email::random(),
        Password::random(),
        Audit::create(
            CreatedAt::now(),
            UpdatedAt::now(),
            null,
            ArchivedAt::nullable(),
            DeletedAt::nullable()
        ),
    );

    /** @var IUserService $userService */
    $userService = $container->get(IUserService::class);
    $user = $userService->createNewUser($dto);

    dd($user);
}
