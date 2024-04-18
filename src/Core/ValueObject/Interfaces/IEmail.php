<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

use App\Core\IValueObject;

interface IEmail extends IValueObject
{
    public function getValue(): string;

    public function equals(self $other): bool;

    public static function random(): self;

    public static function validate(string $email): bool;

    public static function create(string|self $value): self;
}
