<?php

declare(strict_types=1);

use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\CreatedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;

describe('CreatedAt', function () {
    test('Deve retornar true quando uma data valida for passada como string')
        ->expect(CreatedAt::validate('2021-01-01 00:00:00'))->toBeTrue();

    test('Deve retornar false quando uma data invalida for passada como string')
        ->expect(CreatedAt::validate('invalid'))->toBeFalse();

    test('Deve retornar true quando uma data valida for passada como CarbonInterface')
        ->expect(CreatedAt::validate(new DateTime()))->toBeTrue();

    test('Deve retornar true quando uma data valida for passa como DateTimeInterface')
        ->expect(CreatedAt::validate(new DateTime()))->toBeTrue();

    test('Deve criar uma nova instancia de CreatedAt com uma data valida como string')
        ->expect(CreatedAt::create('2021-01-01 00:00:00'))->toBeInstanceOf(ICreatedAt::class);

    test('Deve criar uma nova instancia de CreatedAt com uma data valida como CarbonInterface')
        ->expect(CreatedAt::create(new DateTime()))->toBeInstanceOf(ICreatedAt::class);

    test('Deve criar uma nova instancia de CreatedAt com uma data valida como DateTimeInterface')
        ->expect(CreatedAt::create(new DateTime()))->toBeInstanceOf(ICreatedAt::class);

    test('Deve lancar uma excecao quando uma data invalida for passada como string')
        ->throws(ValueObjectException::class)
        ->expect(fn () => CreatedAt::create(''));

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo __toString for chamado')
        ->expect((string) CreatedAt::create('2021-01-01 00:00:00'))->toBe('2021-01-01 00:00:00');

    test('Deve retornar uma instancia de DateTimeInterface quando o metodo getValue for chamado')
        ->expect(CreatedAt::create('2021-01-01 00:00:00')->getValue())->toBeInstanceOf(DateTimeInterface::class);

    test('Deve retornar uma string formatada quando o metodo format for chamado')
        ->expect(CreatedAt::create('2021-01-01 00:00:00')->format('Y'))->toBe('2021');

    test('Deve retornar uma instancia de ICreatedAt quando o metodo random for chamado')
        ->expect(CreatedAt::random())->toBeInstanceOf(ICreatedAt::class);

    test('Deve retornar uma instancia de ICreatedAt quando o metodo now for chamado')
        ->expect(CreatedAt::now())->toBeInstanceOf(ICreatedAt::class);

    test('Deve retornar string com a data formata para padrao ISO8601 quando o metodo toIso8601 for chamado')
        ->todo()
        ->expect(CreatedAt::create('2021-01-01T21:53:51-03:00')->toIso8601())->toBe('2021-01-01T00:00:00.000000Z');
})
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject');
