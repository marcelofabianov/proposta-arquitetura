<?php

declare(strict_types=1);

namespace App\Core\ValueObject\Interfaces;

use App\Core\IDateTime;
use App\Core\INullable;
use App\Core\IValueObject;
use DateTimeInterface;

interface IArchivedAt extends IValueObject, INullable, IDateTime
{
    public static function random(): self;

    public static function now(): self;

    public static function create(string|null|DateTimeInterface $value): self;
}
