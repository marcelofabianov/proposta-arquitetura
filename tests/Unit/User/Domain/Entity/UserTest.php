<?php

declare(strict_types=1);

use App\Audit\Domain\Entity\Audit;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Password;
use App\Core\ValueObject\Uuid;
use App\User\Domain\Entity\Dto\CreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;
use App\User\Domain\Entity\User;

use function Pest\Faker\fake;

describe('User', function () {
    test('Deve criar uma nova instancia', function () {
        $user = User::create(
            new CreateUserDto(
                id: Uuid::random(),
                name: fake()->firstName(),
                email: Email::random(),
                password: Password::random(),
                audit: Audit::create()
            )
        );

        expect($user)->toBeInstanceOf(IUser::class);
    });

    test('Deve retornar uma array de dados', function () {
        $user = User::create(
            new CreateUserDto(
                id: Uuid::random(),
                name: fake()->firstName(),
                email: Email::random(),
                password: Password::random(),
                audit: Audit::create()
            )
        );

        expect($user->toArray())->toBeArray();
    });

    test('Deve retornar os dados de User', function () {
        $id = Uuid::random();
        $name = fake()->firstName();
        $email = Email::random();
        $password = Password::random();
        $audit = Audit::create();

        $user = User::create(
            new CreateUserDto(
                id: $id,
                name: $name,
                email: $email,
                password: $password,
                audit: $audit
            )
        );

        expect($user->getId())->toBe($id)
            ->and($user->getName())->toBe($name)
            ->and($user->getEmail())->toBe($email)
            ->and($user->getPassword())->toBe($password)
            ->and($user->getAudit())->toBe($audit);
    });
})
    ->group('Unit', 'User', 'Entity', 'User');
