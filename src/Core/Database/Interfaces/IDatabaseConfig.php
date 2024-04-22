<?php

declare(strict_types=1);

namespace App\Core\Database\Interfaces;

interface IDatabaseConfig
{
    public static function fromEnv(): self;

    public function toArray(): array;
}
