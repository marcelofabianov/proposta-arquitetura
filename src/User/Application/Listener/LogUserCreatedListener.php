<?php

declare(strict_types=1);

namespace App\User\Application\Listener;

use App\User\Application\Event\Interfaces\IUserCreatedEvent;
use App\User\Application\Listener\Interfaces\ILogUserCreatedListener;

final readonly class LogUserCreatedListener implements ILogUserCreatedListener
{
    public function __construct(
        private IUserCreatedEvent $userCreatedEvent
    ) {
    }

    public function handle(): void
    {
        dd($this->userCreatedEvent);
    }
}
