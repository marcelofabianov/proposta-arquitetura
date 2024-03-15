<?php

declare(strict_types=1);

test('Nao deve ser mantidas funcoes globais de debug')
    ->expect(['dd', 'dump', 'print', 'print_r', 'var_dump', 'ds', 'ray'])
    ->not->toBeUsed();

test('Todo arquivo deve ter conter strict types ativo')
    ->expect('Marcelofabianov\MyMoney')
    ->toUseStrictTypes();
