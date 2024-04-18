<?php

declare(strict_types=1);

use App\Core\Exceptions\PasswordException;
use App\Core\ValueObject\Interfaces\IPassword;
use App\Core\ValueObject\Password;

describe('Password', function () {
    test('Deve retornar true quando senha informada for forte')
        ->expect(Password::validate('Abc123!@#'))->toBeTrue();

    test('Deve retornar false quando senha informada for fraca')
        ->expect(Password::validate('abc123'))->toBeFalse();

    test('Deve retornar false quando senha informada for vazia')
        ->expect(Password::validate(''))->toBeFalse();

    test('Deve retornar false quando senha nao conter letras')
        ->expect(Password::validate('12345678'))->toBeFalse();

    test('Deve retornar false quando senha nao conter numeros')
        ->expect(Password::validate('Abcdefgh'))->toBeFalse();

    test('Deve retornar false quando senha nao conter caracteres especiais')
        ->expect(Password::validate('Abcdefgh12345678'))->toBeFalse();

    test('Deve retornar false quando senha conter menos de 8 caracteres')
        ->expect(Password::validate('Abc123!'))->toBeFalse();

    test('Deve retornar false quando a senha nao tiver letras maiusculas')
        ->expect(Password::validate('abc123!@#'))->toBeFalse();

    test('Deve retornar false quando a senha nao tiver letras minusculas')
        ->expect(Password::validate('ABC123!@#'))->toBeFalse();

    test('Deve criar uma nova instancia de Password quando a senha informada for forte')
        ->expect(Password::create('Abc123!@#'))->toBeInstanceOf(IPassword::class);

    test('Deve lancar uma excecao quando tentar criar uma instancia de Password com a senha fraca')
        ->throws(exception: PasswordException::class)
        ->expect(fn () => Password::create('12345678'));

    test('Deve retornar true quando a senha informada for igual a senha da instancia')
        ->expect(Password::create('Abc123!@#')
            ->equals(Password::create('Abc123!@#')))->toBeTrue();

    test('Deve retornar false quando a senha informada for diferente da senha da instancia')
        ->expect(Password::create('Abc12$@$#3')
            ->equals(Password::create('Abc123!@#')))->toBeFalse();

    test('Deve criar uma nova instancia de Password com senha aleatoria valida')
        ->expect(Password::random())->toBeInstanceOf(IPassword::class)
        ->and(Password::validate(Password::random()->getValue()))->toBeTrue()
        ->repeat(random_int(100, 200));
})
    ->group('Password', 'ValueObject', 'Core', 'Unit');
