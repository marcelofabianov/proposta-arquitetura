<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports;

use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\DatetimeValueObjectInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\NullableValueObjectInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\ValueObjectInterface;
use DateTimeInterface;

interface InactivatedAtInterface extends DatetimeValueObjectInterface, NullableValueObjectInterface, ValueObjectInterface
{
    public static function random(): self;

    public static function now(): self;

    public static function create(string|null|DateTimeInterface $value): self;

    public function getValue(): DateTimeInterface|null;
}
