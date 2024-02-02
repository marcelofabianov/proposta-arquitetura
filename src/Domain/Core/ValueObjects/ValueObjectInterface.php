<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects;

interface ValueObjectInterface
{
    public function __toString(): string;

    public function toString(): string;

    public function getValue(): mixed;
}
