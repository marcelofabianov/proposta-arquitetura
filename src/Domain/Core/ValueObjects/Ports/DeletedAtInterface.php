<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\DatetimeValueObjectInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\NullableValueObjectInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\ValueObjectInterface;
use DateTimeInterface;

interface DeletedAtInterface extends DatetimeValueObjectInterface, NullableValueObjectInterface, ValueObjectInterface
{
    public static function random(): self;

    public static function now(): self;

    public static function create(string|null|DateTimeInterface $value): self;

    public function getValue(): DateTimeInterface|null;
}
