<?php

declare(strict_types=1);

use App\Core\ValueObject\Uuid;

require __DIR__.'/../vendor/autoload.php';

/**
 * @throws App\Core\Exceptions\Interfaces\IValueObjectException
 */
function main(): void
{
    echo Uuid::random()->getValue().PHP_EOL;
    echo Uuid::create('123e4567-e89b-12d3-a456-426614174000')->getValue().PHP_EOL;
}
