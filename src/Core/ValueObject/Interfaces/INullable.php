<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

interface INullable
{
    public function isNull(): bool;

    public function isNotNull(): bool;

    public static function nullable(): mixed;
}
