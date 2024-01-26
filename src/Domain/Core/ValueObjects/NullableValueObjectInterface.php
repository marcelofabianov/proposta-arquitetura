<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\ValueObjects;

interface NullableValueObjectInterface
{
    public function isNull(): bool;

    public function isNotNull(): bool;

    public static function nullable(): mixed;
}
