<?php

declare(strict_types=1);

use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\UpdatedAt;

describe('UpdatedAt', function () {
    test('Deve retornar true quando uma data valida for passada como string')
        ->expect(UpdatedAt::validate('2021-01-01 00:00:00'))->toBeTrue();

    test('Deve retornar false quando uma data invalida for passada como string')
        ->expect(UpdatedAt::validate(''))->toBeFalse();

    test('Deve retornar true quando uma data valida for passada como CarbonInterface')
        ->expect(UpdatedAt::validate(new DateTime()))->toBeTrue();

    test('Deve retornar true quando uma data valida for passa como DateTimeInterface')
        ->expect(UpdatedAt::validate(new DateTime()))->toBeTrue();

    test('Deve criar uma nova instancia de UpdatedAt com uma data valida como string')
        ->expect(UpdatedAt::create('2021-01-01 00:00:00'))->toBeInstanceOf(IUpdatedAt::class);

    test('Deve criar uma nova instancia de UpdatedAt com uma data valida como CarbonInterface')
        ->expect(UpdatedAt::create(new DateTime()))->toBeInstanceOf(IUpdatedAt::class);

    test('Deve criar uma nova instancia de UpdatedAt com uma data valida como DateTimeInterface')
        ->expect(UpdatedAt::create(new DateTime()))->toBeInstanceOf(IUpdatedAt::class);

    test('Deve lancar uma excecao quando uma data invalida for passada como string')
        ->throws(ValueObjectException::class)
        ->expect(fn () => UpdatedAt::create(''));

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo __toString for chamado')
        ->expect((string) UpdatedAt::create('2021-01-01 00:00:00'))->toBe('2021-01-01 00:00:00');

    test('Deve retornar uma instancia de DateTimeInterface quando o metodo getValue for chamado')
        ->expect(UpdatedAt::create('2021-01-01 00:00:00')->getValue())->toBeInstanceOf(DateTimeInterface::class);

    test('Deve retornar uma string formatada quando o metodo format for chamado')
        ->expect(UpdatedAt::create('2021-01-01 00:00:00')->format('Y'))->toBe('2021');

    test('Deve retornar uma instancia de IUpdatedAt quando o metodo random for chamado')
        ->expect(UpdatedAt::random())->toBeInstanceOf(IUpdatedAt::class);

    test('Deve retornar uma instancia de IUpdatedAt quando o metodo now for chamado')
        ->expect(UpdatedAt::now())->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('UpdatedAt', 'ValueObject', 'Datetime', 'Core', 'Unit');
