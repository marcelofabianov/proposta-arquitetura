<?php

declare(strict_types=1);

use App\Core\ValueObject\Uuid;

require __DIR__.'/../vendor/autoload.php';

function main(): void
{
    echo Uuid::random()->getValue().PHP_EOL;
}
