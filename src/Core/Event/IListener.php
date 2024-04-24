<?php

declare(strict_types=1);

namespace App\Core\Event;

/**
 * Interface IListener
 */
interface IListener
{
    public function handle(): void;
}
