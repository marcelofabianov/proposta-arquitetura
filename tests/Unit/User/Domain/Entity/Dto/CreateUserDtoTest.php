<?php

declare(strict_types=1);

use App\Audit\Domain\Entity\Audit;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Password;
use App\Core\ValueObject\Uuid;
use App\User\Domain\Entity\Dto\CreateUserDto;
use App\User\Domain\Entity\Interfaces\ICreateUserDto;

use function Pest\Faker\fake;

describe('CreateUserDto', function () {
    test('Deve criar uma nova instancia de CreateUserDto', function () {
        $dto = new CreateUserDto(
            id: Uuid::random(),
            name: fake()->firstName(),
            email: Email::random(),
            password: Password::random(),
            audit: Audit::create()
        );

        expect($dto)->toBeInstanceOf(ICreateUserDto::class);
    });

    test('Deve retornar os valores passados no construtor', function () {
        $id = Uuid::random();
        $name = fake()->firstName();
        $email = Email::random();
        $password = Password::random();
        $audit = Audit::create();

        $dto = new CreateUserDto(
            id: $id,
            name: $name,
            email: $email,
            password: $password,
            audit: $audit
        );

        expect($dto->id)->toBe($id)
            ->and($dto->name)->toBe($name)
            ->and($dto->email)->toBe($email)
            ->and($dto->password)->toBe($password)
            ->and($dto->audit)->toBe($audit);
    });
})
    ->group('Unit', 'User', 'Dto', 'CreateUserDto');
