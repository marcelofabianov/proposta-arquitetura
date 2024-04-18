<?php

declare(strict_types=1);

namespace App\Core\Exceptions\Interfaces;

interface IPasswordException
{
    public static function badPassword(string $message): self;
}
