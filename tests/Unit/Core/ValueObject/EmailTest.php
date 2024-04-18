<?php

declare(strict_types=1);

use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Interfaces\IEmail;
use function Pest\Faker\fake;

describe('Email', function () {
    test('Deve retornar true quando validado com um email válido')
        ->expect(Email::validate(fake()->email))->toBeTrue();

    test('Deve retornar false quando validado com um email invalido')
        ->expect(Email::validate('invalid'))->toBeFalse();

    test('Deve criar uma nova instancia de Email quando informado um email valido')
        ->expect(Email::create(fake()->email))->toBeInstanceOf(IEmail::class);

    test('Deve lancar uma exception quando tentar criar uma nova instancia com email invalido')
        ->throws(ValueObjectException::class)
        ->expect(fn () => Email::create('invalido'));

    test('Deve retornar true quando validado que o email é igual a outro email')
        ->expect(Email::create('email@email.com')->equals(
            Email::create('email@email.com')
        ))->toBeTrue();

    test('Deve retornar uma string quando formado a impressao da instancia Email')
        ->expect(Email::create(fake()->email)->__toString())->toBeString()
        ->and(Email::create('email@email.com')->__toString())->toBeString()
        ->and((string) Email::create(fake()->email))->toBeString();

    test('Deve retornar o valor do email quando chamado o metodo getValue')
        ->expect(Email::create(fake()->email)->getValue())->toBeString();

    test('Deve retornar uma instancia de Email com valor randomico valido')
        ->expect(Email::random())->toBeInstanceOf(IEmail::class)
        ->and(Email::random()->getValue())->toBeString()
        ->and(Email::validate(Email::random()->getValue()))->toBeTrue();
})
    ->group('Email', 'ValueObject', 'Domain', 'Core', 'Unit');
