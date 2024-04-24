<?php

declare(strict_types=1);

use App\Audit\Domain\Entity\Audit;
use App\Audit\Domain\Enum\ActionEnum;
use App\Core\GetContainer;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Password;
use App\Core\ValueObject\Uuid;
use App\User\Application\Service\Interfaces\IUserService;
use App\User\Domain\Entity\Dto\CreateUserDto;

require __DIR__.'/../vendor/autoload.php';

/**
 * @throws Exception
 */
function main(): void
{
    $containerBuilder = GetContainer::get();
    $container = $containerBuilder->build();

    $userId = Uuid::random();
    $dto = new CreateUserDto(
        id: $userId,
        name: 'John Doe',
        email: Email::random(),
        password: Password::random(),
        audit: Audit::create(
            id: Uuid::random(),
            aggregateId: $userId,
            action: ActionEnum::CREATE,
        ),
    );

    /** @var IUserService $userService */
    $userService = $container->get(IUserService::class);
    $user = $userService->createNewUser($dto);

    dd($user->toArray());
}
