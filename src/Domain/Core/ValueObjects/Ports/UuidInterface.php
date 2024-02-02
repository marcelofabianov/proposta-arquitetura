<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports;

use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Adapters\UuidGenerateInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\ValueObjectInterface;

interface UuidInterface extends ValueObjectInterface
{
    public function equals(self $other): bool;

    public static function random(UuidGenerateInterface $generate): self;

    public static function validate(UuidGenerateInterface $generate, string $value): bool;

    public static function create(UuidGenerateInterface $generate, string $value): self;
}
