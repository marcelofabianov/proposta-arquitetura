<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

use App\Core\IValueObject;
use DateTimeInterface;

interface IDeletedAt extends IValueObject, INullable
{
    public function getValue(): ?DateTimeInterface;

    public function toIso8601(): string|null;

    public function format(string $format): string|null;

    public static function nullable(): self;

    public static function random(): self;

    public static function now(): self;
}
