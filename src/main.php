<?php

declare(strict_types=1);

use App\Core\Entity\Audit;
use App\Core\Enum\ActionEnum;
use App\Core\GetContainer;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Password;
use App\Core\ValueObject\Uuid;
use App\User\Application\Interfaces\IUserService;
use App\User\Domain\Entity\Dto\CreateUserDto;

require __DIR__.'/../vendor/autoload.php';

/**
 * @throws Exception
 */
function main(): void
{
    $containerBuilder = GetContainer::get();
    $container = $containerBuilder->build();

    $dto = new CreateUserDto(
        Uuid::random(),
        'John Doe',
        Email::random(),
        Password::random(),
        Audit::create(ActionEnum::CREATE),
    );

    /** @var IUserService $userService */
    $userService = $container->get(IUserService::class);
    $user = $userService->createNewUser($dto);

    dd($user->toArray());
}
