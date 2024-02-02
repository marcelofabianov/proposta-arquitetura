<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports;

use DateTimeInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\DatetimeValueObjectInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\ValueObjectInterface;

interface CreatedAtInterface extends DatetimeValueObjectInterface, ValueObjectInterface
{
    public static function now(): self;

    public static function random(): self;

    public static function create(string|DateTimeInterface $value): self;

    public function getValue(): DateTimeInterface;
}
