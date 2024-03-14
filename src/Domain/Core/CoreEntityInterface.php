<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core;

interface CoreEntityInterface
{
    public function toArray(): array;
}
