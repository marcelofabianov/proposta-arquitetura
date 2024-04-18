<?php

declare(strict_types=1);

use App\Core\Exceptions\ValueObjectException;
use App\Core\ValueObject\DeletedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;

describe('DeletedAt', static function () {
    test('Deve retornar true quando informado um valor de um data como string valida')
        ->expect(DeletedAt::validate('2021-01-01'))->toBeTrue();

    test('Deve retornar true quando informado um valor de um data como CarbonInterface valida')
        ->expect(DeletedAt::validate(new DateTime()))->toBeTrue();

    test('Deve retornar true quando informado um valor de um data como DateTimeInterface valida')
        ->expect(DeletedAt::validate(new DateTime()))->toBeTrue();

    test('Deve retornar false quando informado um valor de um data como string invalida')
        ->expect(DeletedAt::validate('invalid'))->toBeFalse();

    test('Deve criar uma nova instancia de DeletedAt com valor inicial null')
        ->expect(DeletedAt::create(null)->getValue())->toBeNull();

    test('Deve retornar valor null ao chamar o método nullable()')
        ->expect(DeletedAt::nullable()->getValue())->toBeNull()
        ->and(DeletedAt::nullable()->isNull())->toBeTrue()
        ->and(DeletedAt::nullable())->toBeInstanceOf(IDeletedAt::class)
        ->and(DeletedAt::nullable())->toEqual(DeletedAt::create(null));

    test('Deve retornar true quando verificado se o valor da instancia esta como null')
        ->expect(DeletedAt::create(null)->isNull())->toBeTrue();

    test('Deve retornar false quando verificado se o valor da instancia esta como null')
        ->expect(DeletedAt::create(new DateTime())->isNull())->toBeFalse();

    test('Deve retornar true quando verificado se o valor da instancia nao e null')
        ->expect(DeletedAt::create(new DateTime())->isNotNull())->toBeTrue();

    test('Deve retornar false quando verificado se o valor da instancia nao e null')
        ->expect(DeletedAt::create(null)->isNotNull())->toBeFalse();

    test('Deve retornar uma nova instancia de DeletedAt com valor inicial igual a data atual')
        ->expect(DeletedAt::now()->getValue())->toBeInstanceOf(DateTime::class);

    test('Deve retornar uma nova instancia de DeletedAt com valor randomico')
        ->expect(DeletedAt::random()->getValue())->toBeInstanceOf(DateTime::class);

    test('Deve lancar uma excecao quando uma data invalida for passada como string')
        ->throws(ValueObjectException::class)
        ->expect(fn () => DeletedAt::create(''));

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo __toString for chamado')
        ->expect((string) DeletedAt::create('2021-01-01 00:00:00'))->toBe('2021-01-01 00:00:00');

    test('Deve retornar uma instancia de DateTimeInterface quando o metodo getValue for chamado')
        ->expect(DeletedAt::create('2021-01-01 00:00:00')->getValue())->toBeInstanceOf(DateTimeInterface::class);

    test('Deve retornar uma string formatada quando o metodo format for chamado')
        ->expect(DeletedAt::create('2021-01-01 00:00:00')->format('Y'))->toBe('2021');

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo toISOString for chamado')
        ->expect(DeletedAt::create('2021-01-01 00:00:00')->format())->toBe('2021-01-01 00:00:00');

    test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo format for chamado')
        ->expect(DeletedAt::create('2021-01-01 00:00:00')->format())->toBe('2021-01-01 00:00:00');

    test('Deve retornar null quando o metodo toISOString for chamado e o valor da instancia for null')
        ->expect(DeletedAt::create(null)->toIso8601())->toBeNull();

    test('Deve retornar null quando o metodo format for chamado e o valor da instancia for null')
        ->expect(DeletedAt::create(null)->format())->toBeNull();

    test('Deve retornar null quando o metodo getValue for chamado e o valor da instancia for null')
        ->expect(DeletedAt::create(null)->getValue())->toBeNull();

    test('Deve retornar string vazia quando o metodo __toString for chamado e o valor da instancia for null')
        ->expect((string) DeletedAt::create(null))->toBe('');

    test('Deve retornar true quando o metodo hasNullValue for chamado e o valor da instancia for null')
        ->expect(DeletedAt::create(null)->isNull())->toBeTrue();

    test('Deve retornar false quando o metodo hasNullValue for chamado e o valor da instancia for uma data valida')
        ->expect(DeletedAt::create('2023-01-01 00:00:00')->isNull())->toBeFalse();
})
    ->group('DeletedAt', 'ValueObject', 'Datetime', 'Core', 'Unit');
