<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

use App\Core\IValueObject;

interface IUuid extends IValueObject
{
    public function equals(self $other): bool;

    public function getValue(): string;

    public static function random(): self;

    public static function validate(string $value): bool;

    public static function create(string $value): self;
}
