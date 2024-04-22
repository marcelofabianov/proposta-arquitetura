<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

use DateTimeInterface;

interface IDateTime
{
    public function getValue(): ?DateTimeInterface;

    public function toIso8601(): string|null;

    public function format(string $format): string|null;

    public static function now(): mixed;

    public static function random(): mixed;

    public static function validate(string|DateTimeInterface $value): bool;
}
