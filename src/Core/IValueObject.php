<?php

declare(strict_types=1);

namespace App\Core;

interface IValueObject
{
    public function __toString(): string;

    public function toString(): string;
}
