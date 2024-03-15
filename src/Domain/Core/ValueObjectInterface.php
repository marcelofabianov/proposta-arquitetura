<?php

namespace Marcelofabianov\Pluto\Domain\Core;

interface ValueObjectInterface
{
    public function __toString(): string;

    public function toString(): string;

    public function getValue(): mixed;
}
