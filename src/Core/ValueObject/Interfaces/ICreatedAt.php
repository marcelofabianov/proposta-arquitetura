<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

use App\Core\IValueObject;
use DateTimeInterface;

interface ICreatedAt extends IValueObject, IDateTime
{
    public static function now(): self;

    public static function random(): self;

    public static function create(string|DateTimeInterface $value): self;
}
