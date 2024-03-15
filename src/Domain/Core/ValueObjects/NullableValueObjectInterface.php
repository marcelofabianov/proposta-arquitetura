<?php

namespace Marcelofabianov\Pluto\Domain\Core\ValueObjects;

interface NullableValueObjectInterface
{
    public function isNull(): bool;

    public function isNotNull(): bool;

    public static function nullable(): mixed;
}
