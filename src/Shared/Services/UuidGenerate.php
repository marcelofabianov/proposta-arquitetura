<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Shared\Services;

use Marcelofabianov\Ddd\Shared\Services\Ports\UuidGenerateInterface;
use Ramsey\Uuid\Uuid as RamseyUuid;

final class UuidGenerate implements UuidGenerateInterface
{
    public static function generate(): string
    {
        return RamseyUuid::uuid4()->toString();
    }

    public static function validate(string $value): bool
    {
        return RamseyUuid::isValid($value);
    }
}
