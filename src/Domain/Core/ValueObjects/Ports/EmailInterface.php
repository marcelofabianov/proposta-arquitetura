<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\ValueObjectInterface;

interface EmailInterface extends ValueObjectInterface
{
    public static function nullable(): self;

    public function getValue(): string|null;

    public function equals(self $other): bool;

    public static function validate(string $email): bool;

    public static function random(): self;

    public static function create(string|self $value): self;
}
