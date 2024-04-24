<?php

declare(strict_types=1);

namespace App\User\Application\Listener\Interfaces;

use App\Core\Event\IListener;
use App\User\Application\Event\Interfaces\IUserCreatedEvent;

interface ILogUserCreatedListener extends IListener
{
    public function __construct(IUserCreatedEvent $userCreatedEvent);
}
