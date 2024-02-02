<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Adapters;

interface UuidGenerateInterface
{
    public static function generate(): string;

    public static function validate(string $value): bool;
}
