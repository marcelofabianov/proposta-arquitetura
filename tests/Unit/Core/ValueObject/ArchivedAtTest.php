<?php

declare(strict_types=1);

use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\ArchivedAt;
use App\Core\ValueObject\Interfaces\IArchivedAt;

describe('ArchivedAt', function () {
    test('Deve retornar true quando informado um valor de um data como string valida')
        ->expect(ArchivedAt::validate('2021-01-01'))->toBeTrue();

    test('Deve retornar true quando informado um valor de um data como CarbonInterface valida')
        ->expect(ArchivedAt::validate(new DateTime()))->toBeTrue();

    test('Deve retornar true quando informado um valor de um data como DateTimeInterface valida')
        ->expect(ArchivedAt::validate(new DateTime()))->toBeTrue();

    test('Deve retornar false quando informado um valor de um data como string invalida')
        ->expect(ArchivedAt::validate('invalid'))->toBeFalse();

    test('Deve criar uma nova instancia de ArchivedAt com valor inicial null')
        ->expect(ArchivedAt::create(null)->getValue())->toBeNull();

    test('Deve retornar valor null ao chamar o método nullable()')
        ->expect(ArchivedAt::nullable()->getValue())->toBeNull()
        ->and(ArchivedAt::nullable()->isNull())->toBeTrue()
        ->and(ArchivedAt::nullable())->toBeInstanceOf(IArchivedAt::class)
        ->and(ArchivedAt::nullable())->toEqual(ArchivedAt::create(null));

    test('Deve retornar true quando verificado se o valor da instancia esta como null')
        ->expect(ArchivedAt::create(null)->isNull())->toBeTrue();

    test('Deve retornar false quando verificado se o valor da instancia esta como null')
        ->expect(ArchivedAt::create(new DateTime())->isNull())->toBeFalse();

    test('Deve retornar true quando verificado se o valor da instancia nao e null')
        ->group('ArchivedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
        ->expect(ArchivedAt::create(new DateTime())->isNotNull())->toBeTrue();

    test('Deve retornar false quando verificado se o valor da instancia nao e null')
        ->expect(ArchivedAt::create(null)->isNotNull())->toBeFalse();

    test('Deve retornar uma nova instancia de ArchivedAt com valor inicial igual a data atual')
        ->expect(ArchivedAt::now()->getValue())->toBeInstanceOf(DateTime::class);

    test('Deve retornar uma nova instancia de ArchivedAt com valor randomico')
        ->expect(ArchivedAt::random()->getValue())->toBeInstanceOf(DateTime::class);

    test('Deve lancar uma excecao quando uma data invalida for passada como string')
        ->throws(ValueObjectException::class)
        ->expect(fn () => ArchivedAt::create(''));

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo __toString for chamado')
        ->expect((string) ArchivedAt::create('2021-01-01 00:00:00'))->toBe('2021-01-01 00:00:00');

    test('Deve retornar uma instancia de DateTimeInterface quando o metodo getValue for chamado')
        ->expect(ArchivedAt::create('2021-01-01 00:00:00')->getValue())->toBeInstanceOf(DateTimeInterface::class);

    test('Deve retornar uma string formatada quando o metodo format for chamado')
        ->expect(ArchivedAt::create('2021-01-01 00:00:00')->format('Y'))->toBe('2021');

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo toISOString for chamado')
        ->expect(ArchivedAt::create('2021-01-01 00:00:00')->format())->toBe('2021-01-01 00:00:00');

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo format for chamado')
        ->expect(ArchivedAt::create('2021-01-01 00:00:00')->format())->toBe('2021-01-01 00:00:00');

    test('Deve retornar null quando o metodo toISOString for chamado e o valor da instancia for null')
        ->expect(ArchivedAt::create(null)->toIso8601())->toBeNull();

    test('Deve retornar null quando o metodo format for chamado e o valor da instancia for null')
        ->expect(ArchivedAt::create(null)->format())->toBeNull();

    test('Deve retornar null quando o metodo getValue for chamado e o valor da instancia for null')
        ->expect(ArchivedAt::create(null)->getValue())->toBeNull();

    test('Deve retornar string vazia quando o metodo __toString for chamado e o valor da instancia for null')
        ->expect((string) ArchivedAt::create(null))->toBe('');

    test('Deve retornar true quando o metodo hasNullValue for chamado e o valor da instancia for null')
        ->expect(ArchivedAt::create(null)->isNull())->toBeTrue();

    test('Deve retornar false quando o metodo hasNullValue for chamado e o valor da instancia for uma data valida')
        ->expect(ArchivedAt::create('2023-01-01 00:00:00')->isNull())->toBeFalse();
})
    ->group('ArchivedAt', 'ValueObject', 'Core', 'Unit');
