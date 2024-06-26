<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

use App\Core\IValueObject;

interface IPassword extends IValueObject
{
    public function getValue(): string;

    public function equals(self $other): bool;

    public static function validate(string $value): bool;

    public static function random(): self;

    public static function create(string $value): self;
}
