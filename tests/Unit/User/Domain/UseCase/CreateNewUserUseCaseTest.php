<?php

declare(strict_types=1);

use App\Core\Entity\Audit;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Password;
use App\Core\ValueObject\Uuid;
use App\User\Domain\Entity\Dto\CreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Domain\Entity\User;
use App\User\Domain\UseCase\CreateNewUser\CreateNewUserUseCase;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserRepository;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\IPasswordHashService;

use function Pest\Faker\fake;

describe('CreateNewUser', function () {
    test('Deve executar o caso de uso e retornar um novo usuario a partir dos dados de entrada', function () {
        $dto = new CreateUserDto(
            id: Uuid::random(),
            name: fake()->firstName(),
            email: Email::random(),
            password: Password::random(),
            audit: Audit::create()
        );

        $user = User::create($dto);

        $repository = Mockery::mock(ICreateNewUserRepository::class);
        $repository->allows('create')
            ->with($dto)
            ->andReturn($user);

        $service = Mockery::mock(IPasswordHashService::class);
        $service->allows('hash')
            ->with($dto->password)
            ->andReturn(Password::random());

        $useCase = new CreateNewUserUseCase($repository, $service);
        $user = $useCase->execute($dto);

        expect($user)->toBeInstanceOf(IUser::class);
    });
})
    ->group('Unit', 'UseCase', 'CreateNewUserUseCase');
