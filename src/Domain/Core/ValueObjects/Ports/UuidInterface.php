<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Adapters\UuidGenerateInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\ValueObjectInterface;

interface UuidInterface extends ValueObjectInterface
{
    public function equals(self $other): bool;

    public static function random(UuidGenerateInterface $generate): self;

    public static function validate(UuidGenerateInterface $generate, string $value): bool;

    public static function create(UuidGenerateInterface $generate, string $value): self;
}
